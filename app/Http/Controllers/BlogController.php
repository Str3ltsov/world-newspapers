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

class BlogController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private NodeService $nodeService
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService
                ->getLinkByAttribute('link', '/' . Route::current()->uri);

            return view('blog.index')
                ->with([
                    'link' => $link,
                    'webData' => $link->webData,
                    'blogs' => $this->nodeService->getNodesByAttribute('type_id', Type::BLOG)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
