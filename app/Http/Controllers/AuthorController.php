<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_author = $this->authorService->getAll();

        return view('author.index', compact('list_author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.author_create');
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
        $this->authorService->store($request->all());

        $notification = [
            'message'    => __('message.create', ['attribute' => 'Author']),
            'alert-type' => 'success',
        ];

        return redirect()->route('authors.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->authorService->show($id);

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->authorService->show($id);

        return view('author.author_edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = $this->authorService->update($request->all(), $request->id);
        if ( ! $result) {
            $notification = [
                'message'    => __('message.update_fail', ['attribute' => 'Author']),
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }

        $notification = [
            'message'    => __('message.update', ['attribute' => 'Author']),
            'alert-type' => 'success',
        ];

        return redirect()->route('authors.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorService->delete($id);

        $notification = [
            'message'    => __('message.destroy', ['attribute' => 'Author']),
            'alert-type' => 'warning',
        ];

        return redirect()->route('authors.index')->with($notification);
    }

}
