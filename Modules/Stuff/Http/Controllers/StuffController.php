<?php

namespace Modules\Stuff\Http\Controllers;

use Modules\Phongban\Entities\Phongban;
use Modules\Stuff\Entities\Stuff;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class StuffController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Stuff::query();
            $phongban = (!empty($_GET["phongban"])) ? ($_GET["phongban"]) : ('');
            $loai = (!empty($_GET["loai"])) ? ($_GET["loai"]) : ('');
            $status = (!empty($_GET["status"])) ? ($_GET["status"]) : ('');
            if ($phongban && $loai && $status) {
                $data->whereRaw("stuffs.phongban = '" . $phongban . "'AND stuffs.loai = '" . $loai . "'AND stuffs.status = '" . $status . "'");
            }
            $stuffs = $data->select('*');
            return DataTables::of($stuffs)
                    ->make(true);
            }
        return view('stuff::index');
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
            'phongid' => 'required',
            'status' => 'required'
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
        $phongban = Phongban::pluck('name','id')->all();
        return view('stuff::edit',compact('stuff','phongban'));
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
            'phongid' => 'required'
        ]);
        $stuff->update($request->all());
        return redirect()->route('stuffs.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
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
