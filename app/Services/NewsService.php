<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\News;
use Exception;

class NewsService
{
    public function getNewsInstanceById(int $id): News
    {
        return News::findOrFail($id);
    }

    public function getNewsByCountryOrLink(string $attribute): Collection
    {
        $availableAttributes = ['link_id', 'country_id'];

        if (!in_array($attribute, $availableAttributes))
            throw new Exception(__('Attribute must be either link_id or country_id'));

        return News::where($attribute, '!=', null)->get();
    }

    public function getNewsByAttribute(string $attributeName, mixed $atrributeValue): ?Collection
    {
        $newsModel = new News;

        if (array_search($attributeName, $newsModel->getFillable())) {
            $news = News::where([
                $attributeName => $atrributeValue,
                'active' => true
            ])
                ->orderBy('title')
                ->get();

            if (!$news)
                throw new Exception(__('News not found'));

            return $news;
        }

        return null;
    }
}
