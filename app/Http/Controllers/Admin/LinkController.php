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
        return view('admin.links.index')
            ->with([
                'magazineLinks' => $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE),
                'newsLinks' => $this->linkService->getCategoryLinksByMenuId(Menu::NEWS),
                'mainMenuLinks' => $this->linkService->getCategoryLinksByMenuId(Menu::MAIN_MENU),
                'headerLinks' => $this->linkService->getCategoryLinksByMenuId(Menu::HEADER),
                'magazineSublinks' => $this->linkService->getLinksByLikeLink('magazines'),
                'newsSublinks' => $this->linkService->getLinksByLikeLink('news')
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
                if ($validatedForm['menu_id'] == Menu::MAGAZINE)
                    $validatedForm['link'] = '/magazines/' . $link;
                if ($validatedForm['menu_id'] == Menu::NEWS)
                    $validatedForm['link'] = '/news/' . $link;
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

    public function show(int $id)
    {
        return view('admin.links.show')
            ->with('link', $this->linkService->getLinkById($id));
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
}
