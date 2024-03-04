<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Link;
use Exception;

class LinkService
{
    public function getLinks(): Collection
    {
        return Link::all();
    }

    public function getLinkByAttribute(string $attributeName, mixed $atrributeValue): ?Link
    {
        $linkModel = new Link;

        if (array_search($attributeName, $linkModel->getFillable())) {
            $link = Link::where($attributeName, $atrributeValue)->first();

            if (!$link)
                throw new Exception(__('Link not found'));

            return $link;
        }

        return null;
    }
}
