<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNodeRequest;
use App\Http\Requests\UpdateNodeRequest;
use App\Models\Node;
use App\Models\Type;
use App\Services\NodeService;
use Illuminate\Http\Request;
use Throwable;

class CustomPageController extends Controller
{
    public function __construct(private NodeService $nodeService)
    {
    }

    public function index()
    {
        return view('admin.custom_pages.index')
            ->with(
                'custom_pages',
                $this->nodeService->getNodesByAttribute('type_id', Type::PAGE)
            );
    }

    public function create()
    {
        return view('admin.custom_pages.create');
    }

    public function store(CreateNodeRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $validatedForm['path'] = '/' . $validatedForm['path'];

            $customPage = Node::create($validatedForm);

            return redirect()
                ->route('custom_pages.index')
                ->with('success', "Successfully created custom page - $customPage->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function show(int $id)
    {
        return view('admin.custom_pages.show')
            ->with('custom_page', $this->nodeService->getNodeById($id));
    }

    public function edit(int $id)
    {
        return view('admin.custom_pages.edit')
            ->with('custom_page', $this->nodeService->getNodeById($id));
    }

    public function update(int $id, UpdateNodeRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $path = $validatedForm['path'];

            if (!str_contains($path, '/'))
                $validatedForm['path'] = '/' . $path;

            $customPage = $this->nodeService->getNodeById($id);
            $customPage->update($validatedForm);

            return redirect()
                ->route('custom_pages.index')
                ->with('success', "Successfully created custom page - $customPage->title");
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
            $customPage = $this->nodeService->getNodeById($id);
            $customPage->delete();

            return redirect()
                ->route('custom_pages.index')
                ->with('success', "Successfully deleted custom page - $customPage->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
