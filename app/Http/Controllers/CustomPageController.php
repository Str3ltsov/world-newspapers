<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Services\NodeService;
use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class CustomPageController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private NodeService $nodeService
    ) {
    }

    public function index(string $page): Renderable|RedirectResponse
    {
        try {
            $path = '/' . $page;
            $link = $this->linkService->getLinkByAttribute('link', $path);

            return view('custom_page.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromNode($link->link),
                    'link' => $link,
                    'webData' => $link->webData,
                    'page' => $this->nodeService->getNodeByAttribute('path', $path)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
