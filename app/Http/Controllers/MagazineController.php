<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\MagazineService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class MagazineController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private MagazineService $magazineService
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/' . Route::current()->uri);
            $animalsLink = $this->linkService
                ->getLinkByAttribute('link', '/' . Route::current()->uri . '/animals');

            return view('magazines.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromLink($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $animalsLink->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $animalsLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function magazinesByCategory(string $category): Renderable|RedirectResponse
    {
        try {
            $category = $this->linkService
                ->getLinkByAttribute('link', '/magazines/' . $category);

            return view('magazines.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromLink($category->link),
                    'link' => $category,
                    'webData' => $category->webData,
                    'subcategories' => $category->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $category->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
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
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromLink($subcategoryLink->link),
                    'link' => $subcategoryLink,
                    'webData' => $subcategoryLink->webData,
                    'subcategories' => $categoryLink->children,
                    'magazines' => $this->magazineService
                        ->getMagazinesByAttribute('link_id', $subcategoryLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
