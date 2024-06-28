<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebDataRequest;
use App\Http\Requests\UpdateWebDataRequest;
use App\Models\WebData;
use App\Services\WebDataService;
use Illuminate\Http\Request;
use Throwable;

class WebDataController extends Controller
{
    public function __construct(private WebDataService $webDataService)
    {
    }

    public function index()
    {
        return view('admin.web_data.index')
            ->with('webData', $this->webDataService->getWebData());
    }

    public function create()
    {
        return view('admin.web_data.create');
    }

    public function store(CreateWebDataRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $validatedForm['keywords'] = $this->webDataService
                ->createFormattedKeywords($validatedForm['keywords']);

            $webData = WebData::create($validatedForm);

            return redirect()
                ->route('web_data.index')
                ->with('success', "Successfully created web data - $webData->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function show(int $id)
    {
        return view('admin.web_data.show')
            ->with('webDataInstance', $this->webDataService->getWebDataInstanceById($id));
    }

    public function edit(int $id)
    {
        return view('admin.web_data.edit')
            ->with('webDataInstance', $this->webDataService->getWebDataInstanceById($id));
    }

    public function update(int $id, UpdateWebDataRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $validatedForm['keywords'] = $this->webDataService
                ->createFormattedKeywords($validatedForm['keywords']);

            $webDataInstance = $this->webDataService->getWebDataInstanceById($id);
            $webDataInstance->update($validatedForm);

            return redirect()
                ->route('web_data.index')
                ->with('success', "Successfully edited web data - $webDataInstance->title");
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
            $webDataInstance = $this->webDataService->getWebDataInstanceById($id);
            $webDataInstance->delete();

            return redirect()
                ->route('web_data.index')
                ->with('success', "Successfully deleted web data - $webDataInstance->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
