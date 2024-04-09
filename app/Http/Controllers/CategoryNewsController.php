<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class CategoryNewsController extends Controller
{
    private string $currentLink;

    public function __construct(
        private LinkService $linkService,
        private NewsService $newsService
    ) {
        $this->currentLink = '/' . request()->path();
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', $this->currentLink);
            $worldNewsLink = $this->linkService
                ->getLinkByAttribute('link', $this->currentLink . '/world-news');

            return view('category_news.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $worldNewsLink->children,
                    'news' => $this->newsService->getNewsByAttribute('country_id', null),
                    'parentNews' => $this->newsService->getNewsByAttribute('link_id', $link->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function newsByCategory(string $category): Renderable|RedirectResponse
    {
        try {
            $categoryLink = $this->linkService->getLinkByAttribute('link', '/news/' . $category);

            return view('category_news.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $categoryLink,
                    'webData' => $categoryLink->webData,
                    'subcategories' => $categoryLink->children,
                    'news' => $this->newsService->getNewsByAttribute('country_id', null),
                    'parentNews' => $this->newsService->getNewsByAttribute('link_id', $categoryLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') != 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
