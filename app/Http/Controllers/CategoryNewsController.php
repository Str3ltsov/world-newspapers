<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class CategoryNewsController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private NewsService $newsService
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/' . Route::current()->uri);
            $worldNewsLink = $this->linkService
                ->getLinkByAttribute('link', '/' . Route::current()->uri . '/world-news');

            return view('category_news.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromLink($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $worldNewsLink->children,
                    'news' => $this->newsService->getNewsByAttribute('country_id', null)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByCategory(string $category): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/news/' . $category);

            return view('category_news.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromLink($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $link->children,
                    'news' => $this->newsService->getNewsByAttribute('country_id', null)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
