<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Menu;
use App\Models\News;
use App\Services\CountryService;
use App\Services\FileService;
use App\Services\LinkService;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Throwable;

class NewsController extends Controller
{
    private string $queryErrorMessage = 'Missing query parameter news_type';

    public function __construct(
        private NewsService $newsService,
        private LinkService $linkService,
        private CountryService $countryService,
        private FileService $fileService
    ) {
    }

    public function index()
    {
        return view('admin.news.index')
            ->with([
                'linkNews' => $this->newsService->getNewsByCountryOrLink('link_id'),
                'countryNews' => $this->newsService->getNewsByCountryOrLink('country_id'),
            ]);
    }

    public function create(Request $request)
    {
        $query = $request->query();
        $newsType = $query['news_type'];

        if (isset($newsType)) {
            $links = [];
            $countries = [];

            if ($newsType == NewsTypes::CATEGORY_NEWS)
                $links = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);
            if ($newsType == NewsTypes::COUNTRY_TYPE)
                $countries = $this->countryService->getCountries();

            return view('admin.news.create')
                ->with([
                    'newsType' => $newsType,
                    'links' => $links,
                    'countries' => $countries
                ]);
        }

        return redirect()
            ->route('news.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function store(CreateNewsRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $validatedForm['check'] = 0;
            $logo = $validatedForm['logo'] ?? null;

            if (isset($logo)) {
                $filename = $this->fileService->getFilename($logo);
                $this->fileService->uploadFileToPublic($logo, $filename, 'images/news_logos');
                $validatedForm['logo'] = $filename;
            }

            $newsInstance = News::create($validatedForm);

            return redirect()
                ->route('news.index')
                ->with('success', "Successfully created news - $newsInstance->title");
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
        $newsType = $query['news_type'] ?? null;

        if (isset($newsType)) {
            return view('admin.news.show')
                ->with([
                    'newsInstance' => $this->newsService->getNewsInstanceById($id),
                    'newsType' => $newsType
                ]);
        }

        return redirect()
            ->route('news.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function edit(int $id, Request $request)
    {
        $query = $request->query();
        $newsType = $query['news_type'];

        if (isset($newsType)) {
            $links = [];
            $countries = [];

            if ($newsType == NewsTypes::CATEGORY_NEWS)
                $links = $this->linkService->getCategoryLinksByMenuId(Menu::NEWS);
            if ($newsType == NewsTypes::COUNTRY_TYPE)
                $countries = $this->countryService->getCountries();

            return view('admin.news.edit')
                ->with([
                    'newsInstance' => $this->newsService->getNewsInstanceById($id),
                    'newsType' => $newsType,
                    'links' => $links,
                    'countries' => $countries
                ]);
        }

        return redirect()
            ->route('news.index')
            ->with('error', __($this->queryErrorMessage));
    }

    public function update(int $id, UpdateNewsRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $logo = $validatedForm['logo'] ?? null;

            if (isset($logo)) {
                $filename = $this->fileService->getFilename($logo);
                $this->fileService->uploadFileToPublic($logo, $filename, 'images/news_logos');
                $validatedForm['logo'] = $filename;
            }

            $news = $this->newsService->getNewsInstanceById($id);
            $news->update($validatedForm);

            return redirect()
                ->route('news.index')
                ->with('success', "Successfully edited news - $news->title");
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
            $newsInstance = $this->newsService->getNewsInstanceById($id);
            $newsInstance->delete();

            return redirect()
                ->route('news.index')
                ->with('success', "Successfully deleted news - $newsInstance->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
