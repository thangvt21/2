<?php

namespace Modules\Phongban\Http\Controllers;

use Modules\Phongban\Entities\Phongban;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhongbanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $phongbans = Phongban::latest()->paginate(5);
        return view('phongban::index',compact('phongbans'))
            ->with('i', (request()->input('page',1) - 1) * 5);
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('phongban::create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Phongban::create($request->all());
        return redirect()->route('phongbans.index')
            ->with('success');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Phongban $phongban)
    {
        return view('phongban::show',compact('phongban'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phongban  $phongban
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Phongban $phongban)
    {
        return view('phongban::edit',compact('phongban'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phongban  $phongban
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Phongban $phongban)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $phongban->update($request->all());
        return redirect()->route('phongbans.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phongban  $phongban
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Phongban $phongban)
    {
        $phongban->delete();
        return redirect()->route('phongbans.index');
        //
    }
}
