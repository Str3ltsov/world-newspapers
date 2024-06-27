<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMagazineById(int $menuId): Menu
    {
        return Menu::findOrFail($menuId);
    }

    public function addLinkCountToMenu(Menu $menu): void
    {
        $menu->link_count = $menu->link_count + 1;
        $menu->save();
    }

    public function subtractLinkCountToMenu(Menu $menu): void
    {
        $menu->link_count = $menu->link_count - 1;
        $menu->save();
    }
}
