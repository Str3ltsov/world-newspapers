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

class BlogController extends Controller
{
    public function __construct(private NodeService $nodeService)
    {
    }

    public function index()
    {
        return view('admin.blogs.index')
            ->with(
                'blogs',
                $this->nodeService->getNodesByAttribute('type_id', Type::BLOG)
            );
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(CreateNodeRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $path = $validatedForm['path'];

            if (!str_contains($path, 'blogs'))
                $validatedForm['path'] = '/blogs/' . $path;

            $blog = Node::create($validatedForm);

            return redirect()
                ->route('blogs.index')
                ->with('success', "Successfully created blog - $blog->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function show(int $id)
    {
        return view('admin.blogs.show')
            ->with('blog', $this->nodeService->getNodeById($id));
    }

    public function edit(int $id)
    {
        return view('admin.blogs.edit')
            ->with('blog', $this->nodeService->getNodeById($id));
    }

    public function update(int $id, UpdateNodeRequest $request)
    {
        try {
            $validatedForm = $request->validated();
            $path = $validatedForm['path'];

            if (!str_contains($path, 'blogs'))
                $validatedForm['path'] = '/blogs/' . $path;

            $blog = $this->nodeService->getNodeById($id);
            $blog->update($validatedForm);

            return redirect()
                ->route('blogs.index')
                ->with('success', "Successfully created blog - $blog->title");
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
            $blog = $this->nodeService->getNodeById($id);
            $blog->delete();

            return redirect()
                ->route('blogs.index')
                ->with('success', "Successfully deledted blog - $blog->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
