<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\MagazineService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class MagazineController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private MagazineService $magazineService
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/' . Route::current()->uri);
            $animalsLink = $this->linkService
                ->getLinkByAttribute('link', '/' . Route::current()->uri . '/animals');

            return view('magazines.index')
                ->with([
                    'link' => $link,
                    'webData' => $link->webData,
                    'subcategories' => $animalsLink->children,
                    'magazines' => $this->magazineService->getMagazinesByAttribute('link_id', $animalsLink->id)
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
