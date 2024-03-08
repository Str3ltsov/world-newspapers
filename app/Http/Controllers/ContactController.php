<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class ContactController extends Controller
{
    public function __construct(private LinkService $linkService)
    {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService
                ->getLinkByAttribute('link', '/' . Route::current()->uri);

            return view('contact.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumbFromNode($link->link),
                    'link' => $link,
                    'webData' => $link->webData
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
