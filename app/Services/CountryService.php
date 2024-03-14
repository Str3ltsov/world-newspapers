<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Country;
use Exception;

class CountryService
{
    public function getCountryByAttribute(string $attributeName, mixed $atrributeValue): ?Country
    {
        $countryModel = new Country;

        if (array_search($attributeName, $countryModel->getFillable())) {
            $country = Country::where($attributeName, $atrributeValue)->first();

            if (!$country)
                throw new Exception(__('Country not found'));

            return $country;
        }

        return null;
    }

    public function getCountriesByAttribute(string $attributeName, mixed $atrributeValue): ?Collection
    {
        $countryModel = new Country;

        if (array_search($attributeName, $countryModel->getFillable())) {
            $countries = Country::where([
                $attributeName => $atrributeValue,
                'active' => true
            ])
                ->orderBy('title')
                ->get();

            if (!$countries)
                throw new Exception(__('Countries not found'));

            return $countries;
        }

        return null;
    }
}
