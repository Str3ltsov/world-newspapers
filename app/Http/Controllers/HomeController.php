<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class HomeController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private CountryService $countryService,
        private bool $activeCountries = true
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService
                ->getLinkByAttribute('link', Route::current()->uri);

            return view('home.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromCountry($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'regions' => $this->countryService
                        ->getCountriesByAttribute('parent_id', null, $this->activeCountries)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
