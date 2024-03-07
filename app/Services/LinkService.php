<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Link;
use App\Models\Node;
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

    public function createLinkBreadcrumbFromLink(string $link): array
    {
        $splitLink = $this->createSplitLink($link);
        $linkPath = '';
        $linkBreadcrumb = [];

        for ($i = 0; $i < count($splitLink); $i++) {
            $linkPath = $linkPath . '/' . $splitLink[$i];
            $linkModel = Link::select('title', 'link')->where('link', $linkPath)->first();

            $linkBreadcrumb[] = [
                'title' => $linkModel->title,
                'path' => $linkModel->link
            ];
        }
        return $linkBreadcrumb;
    }

    public function createLinkBreadcrumbFromCountry(string $link): array
    {
        $splitLink = $this->createSplitLink($link);
        $linkPath = '';
        $linkBreadcrumb = [];

        for ($i = 0; $i < count($splitLink); $i++) {
            $linkPath = $linkPath . '/' . $splitLink[$i];
            $linkModel = null;

            if ($i === 0)
                $linkModel = Link::select('title', 'link')->where('link', $linkPath)->first();
            else
                $linkModel = Country::select('title', 'link')->where('link', $linkPath)->first();

            $linkBreadcrumb[] = [
                'title' => $linkModel->title,
                'path' => $linkModel->link
            ];
        }
        return $linkBreadcrumb;
    }

    public function createLinkBreadcrumbFromNode(string $link): array
    {
        $splitLink = $this->createSplitLink($link);
        $linkPath = '';
        $linkBreadcrumb = [];

        for ($i = 0; $i < count($splitLink); $i++) {
            $linkPath = $linkPath . '/' . $splitLink[$i];

            if ($i === 0)
                $linkModel = Link::select('title', 'link')->where('link', $linkPath)->first();
            else
                $linkModel = Node::select('title', 'path')->where('path', $linkPath)->first();

            $linkBreadcrumb[] = [
                'title' => $linkModel->title,
                'path' => $linkModel->link
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
}
