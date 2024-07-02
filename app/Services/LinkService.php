<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Link;
use Exception;

class LinkService
{
    private array $directions = ['up', 'down'];
    private int $orderValue = 2;

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

    public function addCanMoveUpAndDownToLinkParams(Collection $links): void
    {
        $counter = 0;
        $lastCountValue = count($links) - 1;

        foreach ($links as $link) {
            if ($counter == 0 && $lastCountValue == 0) {
                $link->params = '{"canMoveOrderUp": false, "canMoveOrderDown": false}';
                $link->save();
                $counter += 1;
                continue;
            }
            if ($counter == 0) {
                $link->params = '{"canMoveOrderUp": true, "canMoveOrderDown": false}';
                $link->save();
                $counter += 1;
                continue;
            }
            if ($counter == $lastCountValue) {
                $link->params = '{"canMoveOrderUp": false, "canMoveOrderDown": true}';
                $link->save();
                $counter += 1;
                continue;
            }

            $link->params = '{"canMoveOrderUp": true, "canMoveOrderDown": true}';
            $link->save();
            $counter += 1;
            continue;
        }
    }

    public function updateLinkAboveOrderByDirection(Collection $links, int $currentLinkOrder, string $direction): void
    {
        $linkAbove = $this->getLinkAboveCurrentLink($links, $currentLinkOrder);

        if ($direction == $this->directions[0])
            $linkAbove->left = $linkAbove->left - $this->orderValue;
        if ($direction == $this->directions[1])
            $linkAbove->left = $linkAbove->left + $this->orderValue;

        $linkAbove->save();
    }

    public function updateCurrentLinkOrderByDirection(Link $currentLink, string $direction): void
    {
        if ($direction == $this->directions[0])
            $currentLink->left = $currentLink->left - $this->orderValue;
        if ($direction == $this->directions[1])
            $currentLink->left = $currentLink->left + $this->orderValue;

        $currentLink->save();
    }

    public function updateLinkBelowOrderByDirection(Collection $links, int $currentLinkOrder, string $direction): void
    {
        $linkBelow = $this->getLinkBelowCurrentLink($links, $currentLinkOrder);

        if ($direction == $this->directions[0])
            $linkBelow->left = $linkBelow->left - $this->orderValue;
        if ($direction == $this->directions[1])
            $linkBelow->left = $linkBelow->left + $this->orderValue;

        $linkBelow->save();
    }

    private function getLinkAboveCurrentLink(Collection $links, int $currentLinkOrder): Link
    {
        return $links->where('left', '<', $currentLinkOrder)
            ->sortByDesc('id')
            ->first();
    }

    private function getLinkBelowCurrentLink(Collection $links, int $currentLinkOrder): Link
    {
        return $links->where('left', '>', $currentLinkOrder)->first();
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
