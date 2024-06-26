<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMagazineRequest;
use App\Http\Requests\UpdateMagazineRequest;
use App\Models\Magazine;
use App\Models\Menu;
use App\Services\FileService;
use App\Services\MagazineService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Throwable;

class MagazineController extends Controller
{
    private Collection $magazines;

    public function __construct(private MagazineService $magazineService, private FileService $fileService)
    {
        $this->magazines = Menu::find(Menu::MAGAZINE)->links;
    }

    public function index()
    {
        return view('admin.magazines.index')
            ->with('magazines', $this->magazineService->getMagazines());
    }

    public function show(int $id)
    {
        return view('admin.magazines.show')
            ->with('magazine', $this->magazineService->getMagazineById($id));
    }

    public function create()
    {
        return view('admin.magazines.create')
            ->with('links', $this->magazines);
    }

    public function store(CreateMagazineRequest $request)
    {
        try {
            $validatedForm = $request->validated();

            if (isset($validatedForm['cover'])) {
                $cover = $validatedForm['cover'];
                $filename = $this->fileService->getFilename($cover);
                $this->fileService->uploadFileToPublic($cover, $filename, 'images/magazine_covers');
                $validatedForm['cover'] = $filename;
            }

            $magazine = Magazine::create($validatedForm);

            return redirect()
                ->route('magazines.index')
                ->with('success', "Successfully created magazine - $magazine->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function edit(int $id)
    {
        return view('admin.magazines.edit')
            ->with([
                'magazine' => $this->magazineService->getMagazineById($id),
                'links' => $this->magazines
            ]);
    }

    public function update(int $id, UpdateMagazineRequest $request)
    {
        try {
            $validatedForm = $request->validated();

            if (isset($validatedForm['cover'])) {
                $cover = $validatedForm['cover'];
                $filename = $this->fileService->getFilename($cover);
                $this->fileService->uploadFileToPublic($cover, $filename, 'images/magazine_covers');
                $validatedForm['cover'] = $filename;
            }

            $magazine = $this->magazineService->getMagazineById($id);
            $magazine->update($validatedForm);

            return redirect()
                ->route('magazines.index')
                ->with('success', "Successfully edited magazine - $magazine->title");
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
            $magazine = $this->magazineService->getMagazineById($id);
            $magazine->delete();

            return redirect()
                ->route('magazines.index')
                ->with('success', "Successfully deleted magazine - $magazine->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
