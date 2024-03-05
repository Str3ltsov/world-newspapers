<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\News;
use Exception;

class NewsService
{
    public function getNews(): Collection
    {
        return News::all();
    }

    public function getNewsByAttribute(string $attributeName, mixed $atrributeValue): ?Collection
    {
        $newsModel = new News;

        if (array_search($attributeName, $newsModel->getFillable())) {
            $news = News::where($attributeName, $atrributeValue)->get();

            if (!$news)
                throw new Exception(__('News not found'));

            return $news;
        }

        return null;
    }
}
