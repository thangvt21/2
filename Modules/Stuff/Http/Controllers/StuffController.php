<?php

namespace Modules\Stuff\Http\Controllers;

use App\Phongban;
use App\Stuff;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $stuffs = Stuff::latest()->paginate(5);
        return view('stuff::index',compact('stuffs'))
            ->with('i', (\request()->input('page',1) - 1) * 5);
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
        return view('stuff::create',compact('phongban'));
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
        $request->validate([
            'ma_ccdc' => 'required',
            'model' => 'required',
            'loai' => 'required',
            'soluong' => 'required',
            'detail' => 'required',
            'phongid' => 'required'
        ]);

        $input = $request->all();
        $stuff = Stuff::create($input);

        return redirect()->route('stuffs.index')
            ->with('success');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stuffs = Stuff::where('id','=',$id)->get();
        return view('stuff::show',compact('stuffs'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Stuff $stuff)
    {
        return view('stuff::edit',compact('stuff'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stuff $stuff)
    {
        $request->validate([
            'ma_ccdc' => 'required',
            'model' => 'required',
            'loai'  => 'required',
            'detail' => 'required',
        ]);
        $stuff->update($request->all());
        return redirect()->route('stuffs.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stuff $stuff)
    {
        $stuff->delete();
        return redirect()->route('stuffs.index')
            ->with('success');
        //
    }
}
