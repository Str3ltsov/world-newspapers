<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Country;
use Exception;

class CountryService
{
    public function getCoutries(): Collection
    {
        return Country::all();
    }

    public function getCountriesByAttribute(string $attributeName, mixed $atrributeValue): ?Collection
    {
        $countryModel = new Country;

        if (array_search($attributeName, $countryModel->getFillable())) {
            $countries = Country::where($attributeName, $atrributeValue)->get();

            if (!$countries)
                throw new Exception(__('Countries not found'));

            return $countries;
        }

        return null;
    }
}
