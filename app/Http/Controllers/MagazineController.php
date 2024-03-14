<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\MagazineService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class MagazineController extends Controller
{
    private string $currentLink;

    public function __construct(
        private LinkService $linkService,
        private MagazineService $magazineService
    ) {
        $this->currentLink = '/' . request()->path();
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', $this->currentLink);
            $animalsLink = $this->linkService
                ->getLinkByAttribute('link', $this->currentLink . '/animals');

            return view('magazines.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $animalsLink->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $animalsLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function magazinesByCategory(string $category): Renderable|RedirectResponse
    {
        try {
            $categoryLink = $this->linkService
                ->getLinkByAttribute('link', '/magazines/' . $category);

            return view('magazines.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $categoryLink,
                    'webData' => $categoryLink->webData,
                    'subcategories' => $categoryLink->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $categoryLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function magazinesBySubcategory(string $category, string $subcategory): Renderable|RedirectResponse
    {
        try {
            $categoryLink = $this->linkService
                ->getLinkByAttribute('link', '/magazines/' . $category);
            $subcategoryLink = $this->linkService
                ->getLinkByAttribute('link', '/magazines/' . $category . '/' . $subcategory);

            return view('magazines.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $subcategoryLink,
                    'webData' => $subcategoryLink->webData,
                    'subcategories' => $categoryLink->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $subcategoryLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
