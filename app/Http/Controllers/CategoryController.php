<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
        
        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        // dd($categories);
        return view('categories.index', compact('categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'required|image|max:2000'
        ]);

        if ($request->image) {

            $imgpath = $request->image->store('category', 'public');

            $users = Category::create(array_merge(
                [
                    'name' => $request->name,
                ],
                ['image' => $imgpath]
            ));

            return redirect()->route('categories.index')
            ->with('success', 'categoty created successfully.');
        }else {
            $users= Category::create([
                'name' => $request->name,
            ]);
            // dd($users);
            return redirect()->route('categories.index')
            ->with('success', 'categoty created successfully.');

        }

        // Category::create($request->all());

        // return redirect()->route('categories.index')
        //     ->with('success', 'Permission created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes|image|max:2000'
        ]);

        if ($request->image) {

            $imgpath = $request->image->store('category', 'public');
            $category = Category::find($id);
            
            $categories = $category->update(array_merge(
                [
                    'name' => $request->name,
                ],
                ['image' => $imgpath]
            ));
            
            return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
        }else {
            $category = Category::find($id);
            // dd($category);

            $categories= $category->update([
                'name' => $request->name,
            ]);
            // dd($users);
            return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');

        }

        // $this->categoryRepository->update($id, $request->all());

        // return redirect()->route('categories.index')
        //     ->with('success', 'Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'category deleted successfully');

    }
}
