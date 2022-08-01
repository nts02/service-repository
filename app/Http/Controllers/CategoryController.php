<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAll();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->categoryService->store($request->all())) {

            $notification = [
                'message'    => __('message.create', ['attribute' => 'Category']),
                'alert-type' => 'success',
            ];

            return redirect()->route('categories.index')->with($notification);
        }

        $notification = [
            'message'    => __('message.create_fail', ['attribute' => 'Category']),
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->categoryService->show($id);

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->show($id);

        return view('category.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = $this->categoryService->update($request->all(), $request->id);
        if ( ! $result) {

            $notification = [
                'message'    => __('message.update_fail', ['attribute' => 'Category']),
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }

        $notification = [
            'message'    => __('message.update', ['attribute' => 'Category']),
            'alert-type' => 'success',
        ];

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->delete($id);

        $notification = [
            'message'    => __('message.destroy', ['attribute' => 'Category']),
            'alert-type' => 'warning',
        ];

        return redirect()->route('categories.index')->with($notification);
    }
}
