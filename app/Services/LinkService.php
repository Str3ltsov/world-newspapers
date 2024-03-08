<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Link;
use App\Models\Node;
use Illuminate\Database\Eloquent\Collection;
use Exception;

class LinkService
{
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

    public function getCategoryLinksByMenuId(string $menuId): Collection
    {
        $categoryLinks = Link::where([
            'parent_id' => null,
            'menu_id' => $menuId
        ])->get();

        if (!$categoryLinks)
            throw new Exception(__('Category links not found'));

        return $categoryLinks;
    }

    public function createLinkBreadcrumb(string $link): array
    {
        $splitLink = $this->createSplitLink($link);
        $linkPath = '';
        $linkBreadcrumb = [];

        for ($i = 0; $i < count($splitLink); $i++) {
            $linkPath = $linkPath . '/' . $splitLink[$i];
            $formatedSplitLinkTitle = $this->formatSplitLinkTitle($splitLink[$i]);

            $linkBreadcrumb[] = [
                'title' => $formatedSplitLinkTitle,
                'path' => $linkPath
            ];
        }
        return $linkBreadcrumb;
    }

    private function createSplitLink(string $link): array
    {
        $splitLink = explode('/', $link);
        array_shift($splitLink);

        return $splitLink;
    }

    private function formatSplitLinkTitle(string $splitLink): string
    {
        $formatedSplitLinkArray = [];
        $splitSplitLink = explode('-', $splitLink);

        for ($i = 0; $i < count($splitSplitLink); $i++) {
            if ($splitSplitLink[$i] === 'and') {
                $formatedSplitLinkArray[] = '&';
                continue;
            }
            if ($splitSplitLink[$i] === 'usa') {
                $formatedSplitLinkArray[] = 'USA';
                continue;
            }

            $formatedSplitLinkArray[] = ucfirst($splitSplitLink[$i]);
            continue;
        }
        return implode(' ', $formatedSplitLinkArray);
    }
}
