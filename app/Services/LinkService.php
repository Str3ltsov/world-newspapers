<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Link;
use Exception;

class LinkService
{
    public function getLinkById(int $id): Link
    {
        return Link::findOrFail($id);
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

    public function getLinksByLikeLink(string $linkValue): ?Collection
    {
        return Link::where('parent_id', '!=', 'null')
            ->where('link', 'like', '%' . $linkValue . '%')
            ->get();
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

    public function getLastWordFromLink(string $link): string
    {
        $splitLink = explode('/', $link);

        return $splitLink[count($splitLink) - 1];
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
        $splitSplitLink = preg_split("/[\_,-]/", $splitLink);

        for ($i = 0; $i < count($splitSplitLink); $i++) {
            $formatedSplitLinkArray[] = match ($splitSplitLink[$i]) {
                'and' => '&',
                'usa' => 'USA',
                default => ucfirst($splitSplitLink[$i])
            };
        }
        return implode(' ', $formatedSplitLinkArray);
    }
}
