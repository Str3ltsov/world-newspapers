<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LinkTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\Menu;
use App\Services\LinkService;
use App\Services\MenuService;
use App\Services\WebDataService;
use Illuminate\Http\Request;
use Throwable;

class LinkController extends Controller
{
    private string $queryErrorMessage = 'Missing query parameters is_a_parent or link_type';

    public function __construct(
        private LinkService $linkService,
        private MenuService $menuService,
        private WebDataService $webDataService
    ) {
    }

    public function index()
    {
        $magazineLinks = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE);
        $newsLinks = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);
        $mainMenuLinks = $this->linkService->getCategoryLinksByMenuId(Menu::MAIN_MENU);
        $headerLinks = $this->linkService->getCategoryLinksByMenuId(Menu::HEADER);
        $magazineSublinks = $this->linkService->getLinksByLikeLink('magazines');
        $newsSublinks = $this->linkService->getLinksByLikeLink('news');

        $this->linkService->addCanMoveUpAndDownToLinkParams($magazineLinks->sortByDesc('left'));
        $this->linkService->addCanMoveUpAndDownToLinkParams($newsLinks->sortByDesc('left'));
        $this->linkService->addCanMoveUpAndDownToLinkParams($mainMenuLinks->sortByDesc('left'));
        $this->linkService->addCanMoveUpAndDownToLinkParams($headerLinks->sortByDesc('left'));
        $this->linkService->addCanMoveUpAndDownToLinkParams($magazineSublinks->sortByDesc('left'));
        $this->linkService->addCanMoveUpAndDownToLinkParams($newsSublinks->sortByDesc('left'));

        return view('admin.links.index')
            ->with([
                'magazineLinks' => $magazineLinks,
                'newsLinks' => $newsLinks,
                'mainMenuLinks' => $mainMenuLinks,
                'headerLinks' => $headerLinks,
                'magazineSublinks' => $magazineSublinks,
                'newsSublinks' => $newsSublinks
            ]);
    }

    public function create(Request $request)
    {
        $query = $request->query();
        $isAParent = $query['is_a_parent'] ?? null;
        $linkType = $query['link_type'] ?? null;

        if (isset($isAParent) && isset($linkType)) {
            $parentLinks = [];
            $menu = [];

            if ($linkType == LinkTypes::MAGAZINE_TYPE)
                $menu = $this->menuService->getMagazineById(Menu::MAGAZINE);
            if ($linkType == LinkTypes::NEWS_TYPE)
                $menu = $this->menuService->getMagazineById(Menu::NEWS);

            if (!$isAParent && $linkType == LinkTypes::MAGAZINE_TYPE)
                $parentLinks = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE);
            if (!$isAParent && $linkType == LinkTypes::NEWS_TYPE)
                $parentLinks = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);

            return view('admin.links.create')
                ->with([
                    'isAParent' => $isAParent,
                    'linkType' => $linkType,
                    'parentLinks' => $parentLinks,
                    'menu' => $menu,
                    'webData' => $this->webDataService->getWebData()
                ]);
        }

        return redirect()
            ->route('links.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function store(CreateLinkRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $parentId = $validatedForm['parent_id'] ?? null;
            $link = $validatedForm['link'] ?? null;

            if (isset($parentId)) {
                $parentLink = $this->linkService->getLinkById($parentId);
                $validatedForm['link'] = $parentLink->link . '/' . $link;
            } else {
                $orderValue = 2;
                $maxOrderFromLinks = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE)->max('left');

                if ($validatedForm['menu_id'] == Menu::MAGAZINE) {
                    $validatedForm['link'] = '/magazines/' . $link;
                    $validatedForm['left'] = $maxOrderFromLinks + $orderValue;
                }
                if ($validatedForm['menu_id'] == Menu::NEWS) {
                    $validatedForm['link'] = '/news/' . $link;
                    $validatedForm['left'] = $maxOrderFromLinks + $orderValue;
                }
            }

            $link = Link::create($validatedForm);

            return redirect()
                ->route('links.index')
                ->with('success', "Successfully created link - $link->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function show(int $id, Request $request)
    {
        $query = $request->query();
        $isAParent = $query['is_a_parent'] ?? null;
        $linkType = $query['link_type'] ?? null;

        return view('admin.links.show')
            ->with([
                'link' => $this->linkService->getLinkById($id),
                'isAParent' => $isAParent,
                'linkType' => $linkType,
            ]);
    }

    public function edit(int $id, Request $request)
    {
        $query = $request->query();
        $isAParent = $query['is_a_parent'] ?? null;
        $linkType = $query['link_type'] ?? null;

        if (isset($isAParent) && isset($linkType)) {
            $parentLinks = [];

            if (!$isAParent && $linkType == LinkTypes::MAGAZINE_TYPE)
                $parentLinks = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE);
            if (!$isAParent && $linkType == LinkTypes::NEWS_TYPE)
                $parentLinks = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);

            return view('admin.links.edit')
                ->with([
                    'link' => $this->linkService->getLinkById($id),
                    'isAParent' => $isAParent,
                    'linkType' => $linkType,
                    'parentLinks' => $parentLinks,
                    'webData' => $this->webDataService->getWebData()
                ]);
        }

        return redirect()
            ->route('links.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function update(int $id, UpdateLinkRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $parentId = $validatedForm['parent_id'] ?? null;

            $lastWordFromLink = $this->linkService->getLastWordFromLink($validatedForm['link']);

            if (isset($parentId)) {
                $parentLink = $this->linkService->getLinkById($parentId);
                $validatedForm['link'] = $parentLink->link . '/' . $lastWordFromLink;
            }

            if (!str_contains($validatedForm['link'], 'magazines/') && $validatedForm['menu_id'] == Menu::MAGAZINE)
                $validatedForm['link'] = '/magazines/' . $lastWordFromLink;
            if (!str_contains($validatedForm['link'], 'news/') && $validatedForm['menu_id'] == Menu::NEWS)
                $validatedForm['link'] = '/news/' . $lastWordFromLink;

            $link = $this->linkService->getLinkById($id);
            $link->update($validatedForm);

            return redirect()
                ->route('links.index')
                ->with('success', "Successfully edited link - $link->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function destroy(int $id)
    {
        try {
            $link = $this->linkService->getLinkById($id);
            $link->delete();

            return redirect()
                ->route('links.index')
                ->with('success', "Successfully deleted link - $link->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function moveLinkOrderUp(int $id, Request $request)
    {
        try {
            $query = $request->query();
            $isAParent = $query['is_a_parent'] ?? null;
            $linkType = $query['link_type'] ?? null;

            if (isset($isAParent) && isset($linkType)) {
                $links = [];

                if ($linkType == LinkTypes::MAGAZINE_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE);
                if ($linkType == LinkTypes::NEWS_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);
                if ($linkType == LinkTypes::MAIN_MENU_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::MAIN_MENU);
                if ($linkType == LinkTypes::HEADER_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::HEADER);
                if ($linkType == LinkTypes::MAGAZINE_TYPE && !$isAParent)
                    $links = $this->linkService->getLinksByLikeLink('magazines');
                if ($linkType == LinkTypes::NEWS_TYPE && !$isAParent)
                    $links = $this->linkService->getLinksByLikeLink('news');

                $link = $this->linkService->getLinkById($id);

                $this->linkService->updateLinkAboveOrderByDirection($links, $link->left, 'down');
                $this->linkService->updateCurrentLinkOrderByDirection($link, 'up');

                $this->linkService->addCanMoveUpAndDownToLinkParams($links->sortByDesc('left'));

                return redirect()
                    ->route('links.index')
                    ->with('success', "Successfully moved - $link->title up");
            }

            return redirect()
                ->route('links.index')
                ->with('error', __($this->queryErrorMessage));
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function moveLinkOrderDown(int $id, Request $request)
    {
        try {
            $query = $request->query();
            $isAParent = $query['is_a_parent'] ?? null;
            $linkType = $query['link_type'] ?? null;

            if (isset($isAParent) && isset($linkType)) {
                $links = [];

                if ($linkType == LinkTypes::MAGAZINE_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE);
                if ($linkType == LinkTypes::NEWS_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);
                if ($linkType == LinkTypes::MAIN_MENU_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::MAIN_MENU);
                if ($linkType == LinkTypes::HEADER_TYPE)
                    $links = $this->linkService->getCategoryLinksByMenuId(Menu::HEADER);
                if ($linkType == LinkTypes::MAGAZINE_TYPE && !$isAParent)
                    $links = $this->linkService->getLinksByLikeLink('magazines');
                if ($linkType == LinkTypes::NEWS_TYPE && !$isAParent)
                    $links = $this->linkService->getLinksByLikeLink('news');

                $link = $this->linkService->getLinkById($id);

                $this->linkService->updateLinkBelowOrderByDirection($links, $link->left, 'up');
                $this->linkService->updateCurrentLinkOrderByDirection($link, 'down');

                $this->linkService->addCanMoveUpAndDownToLinkParams($links->sortByDesc('left'));

                return redirect()
                    ->route('links.index')
                    ->with('success', "Successfully moved - $link->title down");
            }

            return redirect()
                ->route('links.index')
                ->with('error', __($this->queryErrorMessage));
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
