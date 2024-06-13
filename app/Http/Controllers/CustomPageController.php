<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Services\NodeService;
use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class CustomPageController extends Controller
{
    private string $currentLink;

    public function __construct(
        private LinkService $linkService,
        private NodeService $nodeService,
    ) {
        $this->currentLink = '/' . request()->path();
    }

    public function index(string $page): Renderable|RedirectResponse
    {
        try {
            $path = '/' . $page;
            $link = $this->linkService->getLinkByAttribute('link', $path);

            return view('custom_page.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($this->currentLink),
                    'link' => $link,
                    'webData' => $link->webData,
                    'page' => $this->nodeService->getNodeByAttribute('path', $path)
                ]);
        } catch (Throwable $throwable) {
            if ($throwable->getMessage() === 'Link not found')
                return view('page_not_found')
                    ->with('linkBreadcrumb', $this->linkService->createLinkBreadcrumb($this->currentLink));

            if (config('app.env') != 'production') {
                throw $throwable;
            } else
                return back()->with('error', $throwable->getMessage());
        }
    }
		
}
