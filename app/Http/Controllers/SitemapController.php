<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Services\ContactService;
use App\Services\CountryService;
use App\Services\LinkService;
use App\Services\MagazineService;
use App\Services\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class SitemapController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private CountryService $countryService,
        private MagazineService $magazineService,
        private NewsService $newsService,
        private bool $activeRecords = true
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/' . Route::current()->uri);

            return view('sitemap.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromNode($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'regions' => $this->countryService
                        ->getCountriesByAttribute('parent_id', null, $this->activeRecords),
                    'usCountry' => $this->countryService
                        ->getCountryByAttribute('link', '/countries/north-and-central-america/usa'),
                    'magazines' => $this->linkService->getLinkByAttribute('link', '/magazines'),
                    'magazineCategories' => $this->linkService->getCategoryLinksByMenuId(Menu::MAGAZINE),
                    'news' => $this->linkService->getLinkByAttribute('link', '/news'),
                    'newsCategories' => $this->linkService->getCategoryLinksByMenuId(Menu::NEWS),

                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
