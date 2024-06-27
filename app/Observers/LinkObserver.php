<?php

namespace App\Observers;

use App\Models\Link;
use App\Services\MenuService;

class LinkObserver
{
    /**
     * Handle the Link "created" event.
     */
    public function created(Link $link): void
    {
        $menuService = new MenuService;

        $menu = $menuService->getMagazineById($link->menu_id);
        $menuService->addLinkCountToMenu($menu);
    }

    /**
     * Handle the Link "updated" event.
     */
    public function updated(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "deleted" event.
     */
    public function deleted(Link $link): void
    {
        $menuService = new MenuService;

        $menu = $menuService->getMagazineById($link->menu_id);
        $menuService->subtractLinkCountToMenu($menu);
    }

    /**
     * Handle the Link "restored" event.
     */
    public function restored(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "force deleted" event.
     */
    public function forceDeleted(Link $link): void
    {
        //
    }
}
