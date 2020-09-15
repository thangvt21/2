<?php

namespace Modules\Nhanvien\Http\Controllers;

use Modules\Nhanvien\Entities\Nhanvien;
use Modules\Phongban\Entities\Phongban;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NhanvienController extends Controller
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
        $nhanviens = Nhanvien::latest()->paginate(5);
        return view('nhanvien::index',compact('nhanviens'))
                ->with('i', (\request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $phongban = Phongban::pluck('name','id')->all();
        return view('nhanvien::create',compact('phongban'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'note' => 'required',
            'phongban' => 'required',
        ]);

        $input = $request->all();
        $nhanvien = Nhanvien::create($input);

        return redirect()->route('nhanviens.index')->with('success');
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $phongban = Phongban::find($id);
        $nhanvienss = Nhanvien::where("phongban","=",$id)->first();
        $nhanviens = Nhanvien::Where("phongban","=",$id)->get();
        return view('nhanvien::show',compact('nhanviens','nhanvienss','phongban'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Nhanvien $nhanvien)
    {
        return view('nhanvien::edit',compact('nhanvien'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Nhanvien $nhanvien)
    {
        request()->validate([
            'name' => 'required',
            'note' => 'required',
        ]);
        $nhanvien->update($request->all());
        return redirect()->route('nhanviens.show',$nhanvien->phongban)->with('success');
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanviens.index')->with('success');
        //
    }
}
