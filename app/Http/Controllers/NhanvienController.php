<?php

namespace App\Http\Controllers;

use App\Nhanvien;
use App\Phongban;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('nhanviens.index',compact('nhanviens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = Phongban::pluck('name','id')->all();
        return view('nhanviens.create',compact('phongban'));
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
        $this->validate($request, [
            'name' => 'required',
            'note' => 'required',
            'phongban' => 'required',
        ]);

        $input = $request->all();
        $nhanvien = Nhanvien::create($input);

        return redirect()->route('nhanviens.index')
            ->with('success');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phongban = Phongban::find($id);
        $nhanvienss = Nhanvien::where("phongban","=",$id)->first();
        $nhanviens = Nhanvien::Where("phongban","=",$id)->get();
        return view('nhanviens.show',compact("nhanviens",'nhanvienss','phongban'))
                ->with('i');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhanvien $nhanvien)
    {
        return view('nhanviens.edit',compact('nhanvien'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhanvien $nhanvien)
    {
        request()->validate([
            'name' => 'required',
            'note' => 'required',
        ]);
        $nhanvien->update($request->all());
        return redirect()->route('nhanviens.show',$nhanvien->nv_id)
            ->with('success');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanviens.index')
            ->with('success');
        //
    }
}
