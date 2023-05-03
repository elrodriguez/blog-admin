<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Blog\Entities\BloCategory;

class CategoriesController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = (new BloCategory())->newQuery();

        if (request()->has('search')) {
            $categories->where('description', 'Like', '%' . request()->input('search') . '%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $categories->orderBy($attribute, $sort_order);
        } else {
            $categories->latest();
        }

        $categories = $categories->paginate(10)->onEachSide(2)->appends(request()->query());
        return Inertia::render('Blog::categories/List', [
            'categories' => $categories,
            'filters' => request()->all('search')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return Inertia::render('Blog::categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        BloCategory::create([
            'description' => $request->get('name')
        ]);
        return Inertia::render('Blog::categories/List');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(BloCategory $category)
    {
        return Inertia::render('Blog::categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, BloCategory $category)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $category->update([
            'description' => $request->get('name')
        ]);
        return redirect()->route('category.edit', $category->id)
            ->with('message', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
