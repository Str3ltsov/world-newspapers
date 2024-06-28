<?php

namespace App\Services;

use App\Models\WebData;
use Illuminate\Database\Eloquent\Collection;

class WebDataService
{
    public function getWebData(): Collection
    {
        return WebData::all();
    }

    public function getWebDataInstanceById(int $id): WebData
    {
        return WebData::findOrFail($id);
    }

    public function createFormattedKeywords(string $keywordsInput): string
    {
        $keywords = [];
        $keywordsArray = json_decode($keywordsInput, true);

        foreach ($keywordsArray as $keywordValue) {
            $keywords[] = $keywordValue['value'];
        }

        return implode(', ', $keywords);
    }
}
