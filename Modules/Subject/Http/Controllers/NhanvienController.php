<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Modules\Core\Helpers\Logging;
use Modules\Subject\Http\Requests\NhanvienRequest;
use Modules\Subject\Services\NhanvienService;
use Modules\Subject\Services\PhongbanService;

class NhanvienController extends Controller
{
    private $baseView ='subject::nhanvien.';
    /**
     * Display a listing of the resource.
     * @return Respone
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $title = "Danh sach nhan vien";

        \SEO::setTitle($title);

        $param = [];
        if($request->keyword){
            $param['keyword'] = $request->keyword;
        }
        $list = NhanvienService::getPaging($param);

        Logging::LogInfo('Xem danh sach nhan vien');

        return view($this->baseView . __FUNCTION__,compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = "Them nhan vien";

        \SEO::setTitle($title);
        $ListPhongban = PhongbanService::getAll()->sortBy('name')->pluck('name','id');
        return view($this->baseView . __FUNCTION__,compact('title','ListPhongban'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(NhanvienRequest $request)
    {
        try {
            $data = $request->all();
            $id = NhanvienService::create($data);

            $lastUrl =$request->get('lastUrl');
            $route = route('nhanvien.show',['id' => $id, 'lastUrl' => $lastUrl]);

            Logging::LogInfo('Da them nhan vien','nv_id = '. $id);

            return redirect($route)->with('flash-message','Da them nhan vien');
        } catch (\Exception $e) {
            Logging::LogError('Them nhan vien bi loi',''.$e->getMessage());

            return redirect()->back()->withErrors('Them nhan vien loi!');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $title = "Danh sach nhan vien";
        \SEO::setTitle($title);
        $obj = NhanvienService::find($id);
        if(!$obj){
            return abort(404);
        }

        Logging::LogInfo('Xem chi tiet','nv_id = '.$id);

        return view($this->baseView . __FUNCTION__,compact('title','obj'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title = "Sua thong tin nhan vien";
        \SEO::setTitle($title);
        $obj = NhanvienService::find($id);
        $ListPhongban = PhongbanService::getAll()->sortBy('name')->pluck('name','id');
        if(!$obj){
            return abort(404);
        }

        return view($this->baseView.__FUNCTION__,compact('title','obj','ListPhongban'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(NhanvienRequest $request, $id)
    {
        $obj = NhanvienService::find($id);
        if(!$obj){
            return abort(404);
        }

        try {
            $data = $request->all();
            $data['id'] = $id;

            NhanvienService::update($data);

            $lastUrl = $request->get('lastUrl');
            $route = route('nhanvien.show',['id' => $id,'lastUrl' => $lastUrl]);

            Logging::LogInfo('Cap nhat thong tin thanh cong','nv_id = '.$id);
            return redirect($route)->with('flash-message','Da cap nhat thanh cong');
        } catch (\Exception $e){
            Logging::LogError('Cap nhat bi loi','nv_id = '. $id .''.$e->getMessage());

            return redirect()->back()->withErrors('Cap nhat loi');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        try {
            NhanvienService::delete($data['id']);
            Session::flash('flash-message','Da xoa nhan vien');
            Logging::LogInfo('Da xoa','nv_id = '.json_encode($data['id']));

            return \response()->json(['msg'=> 'success']);
        } catch (\Exception $e){
            Logging::LogError('Loi khi xoa','nv_id = ' . json_encode($data['id']) . ''.$e->getMessage());

            return \response()->json([
                'msg' => 'fail',
                'err' =>$e->getMessage()
            ]);
        }
        //
    }
}
