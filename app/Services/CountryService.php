<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as CountryCollection;
use App\Models\Country;
use Exception;

class CountryService
{
    public function getCountries(): Collection
    {
        return Country::all();
    }

    public function getCountryById(int $id): Country
    {
        return Country::findOrFail($id);
    }

    public function getCountriesByLinkClashCount(
        Collection $allCountries,
        int $linkClashCount,
        bool $isAnException = false
    ): CountryCollection {
        $correctCountries = collect();

        foreach ($allCountries as $country) {
            if (
                substr_count($country->link, '/') === $linkClashCount
                && !$isAnException
                && !str_contains($country->link, 'united-kingdom')
            )
                $correctCountries->push($country);

            if (
                substr_count($country->link, '/') === $linkClashCount
                && $isAnException
                && str_contains($country->link, 'united-kingdom')
            )
                $correctCountries->push($country);
        }

        return $correctCountries;
    }

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
