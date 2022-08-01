<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStore;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    protected $bookService;
    protected $categoryService;
    protected $authorService;
    protected $storeService;

    public function __construct(
        BookService $bookService,
        CategoryService $categoryService,
        AuthorService $authorService,
        StoreService $storeService
    ) {
        $this->bookService     = $bookService;
        $this->categoryService = $categoryService;
        $this->authorService   = $authorService;
        $this->storeService    = $storeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookService->getAll();

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->index();
        $authors    = $this->authorService->index();
        $stores     = $this->storeService->index();

        return view('book.book_create', compact('categories', 'authors', 'stores'));
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
        $this->bookService->store($request->all());

        $notification = [
            'message'    => __('message.create', ['attribute' => 'Book']),
            'alert-type' => 'success',
        ];

        return redirect()->route('books.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookService->show($id);

        return view('book.view', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book       = $this->bookService->show($id);
        $authors    = $this->authorService->getAll();
        $categories = $this->categoryService->getAll();
        $stores     = $this->storeService->getAll();

        $listStores = $this->bookService->getStoreArray($id);

        return view('book.book_edit',
            compact('book', 'authors', 'categories', 'stores', 'listStores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->bookService->update($request->all(), $request->id);

        $notification = [
            'message'    => __('message.update', ['attribute' => 'Book']),
            'alert-type' => 'success',
        ];

        return redirect()->route('books.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bookService->delete($id);

        $notification = [
            'message'    => __('message.destroy', ['attribute' => 'Book']),
            'alert-type' => 'warning',
        ];

        return redirect()->back()->with($notification);
    }
}
