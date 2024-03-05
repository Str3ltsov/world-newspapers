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

            return view('news_by_categories.index')
                ->with([
                    'link' => $link,
                    'webData' => $link->webData,
                    'categories' => $worldNewsLink->children,
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
