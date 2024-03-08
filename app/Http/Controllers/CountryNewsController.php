<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\LinkService;
use App\Services\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class CountryNewsController extends Controller
{
    private string $currentLink;

    public function __construct(
        private LinkService $linkService,
        private CountryService $countryService,
        private NewsService $newsService
    ) {
        $this->currentLink = '/' . request()->path();
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', $this->currentLink);

            return view('country_news.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $link,
                    'webData' => $link->webData,
                    'regions' => $this->countryService
                        ->getCountriesByAttribute('parent_id', null)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByRegion(string $region): Renderable|RedirectResponse
    {
        try {
            $region = $this->countryService->getCountryByAttribute('link', '/countries/' . $region);

            return view('country_news.region')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $region,
                    'webData' => $region->webData,
                    'region' => $region,
                    'countries' => $region->children,
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $region->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByCountry(string $region, string $country): Renderable|RedirectResponse
    {
        try {
            $region_ = $this->countryService
                ->getCountryByAttribute('link', '/countries/' .  $region);
            $country = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country);

            return view('country_news.country')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $country,
                    'webData' => $country->webData,
                    'region' => $region_,
                    'country' => $country,
                    'states' => $country->children,
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $country->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByState(string $region, string $country, string $state): Renderable|RedirectResponse
    {
        try {
            $region_ = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region);
            $country_ = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country);
            $state = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country . '/' . $state);

            return view('country_news.state')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $state,
                    'webData' => $state->webData,
                    'region' => $region_,
                    'country' => $country_,
                    'states' => $country_->children,
                    'currentState' => $state,
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $state->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
