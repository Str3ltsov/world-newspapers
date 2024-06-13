<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private string $currentLink;

    public function __construct(
        private LinkService $linkService,
        private CountryService $countryService
    ) {
        $this->currentLink = request()->path();
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', $this->currentLink);

						$user = Auth::user();

            return view('home.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $link,
                    'webData' => $link->webData,
                    'regions' => $this->countryService
                        ->getCountriesByAttribute('parent_id', null),
										'user' => $user
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
