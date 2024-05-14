<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\LinkService;
use App\Services\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByRegion(string $region): Renderable|RedirectResponse
    {
        try {
            $regionLink = $this->countryService->getCountryByAttribute('link', '/countries/' . $region);

            return view('country_news.region')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $regionLink,
                    'webData' => $regionLink->webData,
                    'region' => $regionLink,
                    'countries' => $regionLink->children->sortBy('title'),
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $regionLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByCountry(string $region, string $country): Renderable|RedirectResponse
    {
        try {
            $regionLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' .  $region);
            $countryLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country);

            return view('country_news.country')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $countryLink,
                    'webData' => $countryLink->webData,
                    'region' => $regionLink,
                    'country' => $countryLink,
                    'states' => $countryLink->children->sortBy('title'),
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $countryLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByState(string $region, string $country, string $state): Renderable|RedirectResponse
    {
        try {
            $regionLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region);
            $countryLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country);
            $stateLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country . '/' . $state);

            return view('country_news.state')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $stateLink,
                    'webData' => $stateLink->webData,
                    'region' => $regionLink,
                    'country' => $countryLink,
                    'states' => $countryLink->children->sortBy('title'),
                    'currentState' => $stateLink,
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $stateLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByInnerCountryState(
        string $region,
        string $country,
        string $innerCountry,
        string $state
    ): Renderable|RedirectResponse {
        try {
            $regionLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region);
            $countryLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country);
            $stateLink = $this->countryService
                ->getCountryByAttribute('link', '/countries/' . $region . '/' . $country . '/' . $innerCountry . '/' . $state);

            return view('country_news.state')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $stateLink,
                    'webData' => $stateLink->webData,
                    'region' => $regionLink,
                    'country' => $countryLink,
                    'states' => $countryLink->children->sortBy('title'),
                    'currentState' => $stateLink,
                    'news' => $this->newsService
                        ->getNewsByAttribute('country_id', $stateLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
