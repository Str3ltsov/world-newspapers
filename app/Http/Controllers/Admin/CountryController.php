<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CountryTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use App\Services\CountryService;
use App\Services\FileService;
use App\Services\LinkService;
use App\Services\WebDataService;
use Illuminate\Http\Request;
use Throwable;

class CountryController extends Controller
{
    private string $queryErrorMessage = 'Missing query parameter country_type';

    public function __construct(
        private CountryService $countryService,
        private WebDataService $webDataService,
        private FileService $fileService,
        private LinkService $linkService
    ) {
    }

    public function index()
    {
        $allCounties = $this->countryService->getCountries();

        return view('admin.countries.index')
            ->with([
                'regions' => $this->countryService->getCountriesByLinkClashCount($allCounties, 2),
                'countries' => $this->countryService->getCountriesByLinkClashCount($allCounties, 3),
                'states' => $this->countryService->getCountriesByLinkClashCount($allCounties, 4),
                'ukCountries' => $this->countryService->getCountriesByLinkClashCount($allCounties, 4, true)
            ]);
    }

    public function create(Request $request)
    {
        $query = $request->query();
        $countryType = $query['country_type'] ?? null;

        if (isset($countryType)) {
            $allCounties = $this->countryService->getCountries();

            $parentLinks = match ($countryType) {
                CountryTypes::COUNTRY_TYPE => $this->countryService->getCountriesByLinkClashCount($allCounties, 2),
                CountryTypes::STATE_TYPE => $this->countryService->getCountryByAttribute('code', 'us'),
                CountryTypes::COUNTRY_IN_COUNTRY_TYPE => $this->countryService->getCountryByAttribute('code', 'gb'),
                default => []
            };

            return view('admin.countries.create')
                ->with([
                    'parentLinks' => $parentLinks,
                    'webData' => $this->webDataService->getWebData()
                ]);
        }

        return redirect()
            ->route('countries.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function store(CreateCountryRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $parentId = $validatedForm['parent_id'] ?? null;
            $link = $validatedForm['link'] ?? null;
            $flag = $validatedForm['flag'] ?? null;

            if (isset($parentId)) {
                $parentLink = $this->countryService->getCountryById($parentId);
                $validatedForm['link'] = $parentLink->link . '/' . $link;
            }

            if (isset($flag)) {
                $flag = $validatedForm['flag'];
                $filename = $this->fileService->getFilename($flag);
                $this->fileService->uploadFileToPublic($flag, $filename, 'images/flags');
                $validatedForm['flag'] = $filename;
            }

            $country = Country::create($validatedForm);

            return redirect()
                ->route('countries.index')
                ->with('success', "Successfully created country - $country->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function show(int $id, Request $request)
    {
        $query = $request->query();
        $isAParent = $query['is_a_parent'] ?? null;
        $countryType = $query['country_type'] ?? null;

        if (isset($countryType)) {
            $countryType = match ($countryType) {
                CountryTypes::COUNTRY_TYPE => CountryTypes::COUNTRY_TYPE,
                CountryTypes::STATE_TYPE => CountryTypes::STATE_TYPE,
                CountryTypes::COUNTRY_IN_COUNTRY_TYPE => CountryTypes::COUNTRY_IN_COUNTRY_TYPE,
                default => 1
            };

            return view('admin.countries.show')
                ->with([
                    'country' => $this->countryService->getCountryById($id),
                    'isAParent' => $isAParent,
                    'countryType' => $countryType
                ]);
        }

        return redirect()
            ->route('countries.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function edit(int $id, Request $request)
    {
        $query = $request->query();
        $isAParent = $query['is_a_parent'] ?? null;
        $countryType = $query['country_type'] ?? null;

        if (isset($countryType)) {
            $allCounties = $this->countryService->getCountries();

            $parentLinks = match ($countryType) {
                CountryTypes::COUNTRY_TYPE => $this->countryService->getCountriesByLinkClashCount($allCounties, 2),
                CountryTypes::STATE_TYPE => $this->countryService->getCountryByAttribute('code', 'us'),
                CountryTypes::COUNTRY_IN_COUNTRY_TYPE => $this->countryService->getCountryByAttribute('code', 'gb'),
                default => []
            };

            return view('admin.countries.edit')
                ->with([
                    'country' => $this->countryService->getCountryById($id),
                    'isAParent' => $isAParent,
                    'parentLinks' => $parentLinks,
                    'webData' => $this->webDataService->getWebData()
                ]);
        }

        return redirect()
            ->route('countries.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function update(int $id, UpdateCountryRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $parentId = $validatedForm['parent_id'] ?? null;
            $link = $validatedForm['link'] ?? null;
            $flag = $validatedForm['flag'] ?? null;

            $lastWordFromLink = $this->linkService->getLastWordFromLink($link);

            if (isset($parentId)) {
                $parentLink = $this->linkService->getLinkById($parentId);
                $validatedForm['link'] = $parentLink->link . '/' . $lastWordFromLink;
            }

            if (!str_contains($validatedForm['link'], 'countries/'))
                $validatedForm['link'] = '/countries/' . $lastWordFromLink;

            if (isset($flag)) {
                $flag = $validatedForm['flag'];
                $filename = $this->fileService->getFilename($flag);
                $this->fileService->uploadFileToPublic($flag, $filename, 'images/flags');
                $validatedForm['flag'] = $filename;
            }

            $country = $this->countryService->getCountryById($id);
            $country->update($validatedForm);

            return redirect()
                ->route('countries.index')
                ->with('success', "Successfully edited country - $country->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function destroy(int $id)
    {
        try {
            $country = $this->countryService->getCountryById($id);
            $country->delete();

            return redirect()
                ->route('countries.index')
                ->with('success', "Successfully deleted country - $country->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
