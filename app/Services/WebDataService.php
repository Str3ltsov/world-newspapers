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
}
