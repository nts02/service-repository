<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = $this->storeService->index();

        return view('store.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.store_create');
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
        if($this->storeService->store($request->all())) {

            $notification = [
                'message'    => 'Add Store Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('stores.index')->with($notification);
        }

        $notification = [
            'message'    => 'Add Store Failed',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = $this->storeService->show($id);

        return view('store.view',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = $this->storeService->show($id);

        return view('store.store_edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->storeService->update($request->all(), $id);

        if($result) {
            $notification = [
                'message'    => 'Update Store Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('stores.index')->with($notification);
        }

        $notification = [
            'message'    => 'Update Store Failed',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->storeService->delete($id);

        $notification = [
            'message'    => 'Delete Store Successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->back()->with($notification);
    }
}
