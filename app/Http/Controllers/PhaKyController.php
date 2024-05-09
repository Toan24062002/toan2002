<?php

namespace App\Http\Controllers;
use App\Models\Phaky;
use Illuminate\Http\Request;
use DB;

class PhaKyController extends Controller
{
    public function index ()
    { 
        $phaky= Phaky::all();
        foreach ($phaky as $pk)
         {            
            $vochongHoten = DB::table('phaky')->select('hoten')->where('id', $pk->vochong)->value('hoten');
            if($pk->gioitinh==1)
                {
                    $pk->tenvochong = "chồng là ".$vochongHoten;
                }
                else{
                    $pk->tenvochong = "vợ là ".$vochongHoten;}
        }
        return view('Phaky.index', compact('phaky'));
    }
    public function addvo($id)
    { 
        $phaky= Phaky::findOrFail($id);
        return view ('Phaky.create', compact('phaky'));
    }

    public function edit($id)
    {
        $phaky= Phaky::findOrFail($id);
        return view ('Phaky.edit', compact('phaky'));
    }

    public function addcon($id)
    {
        $phaky= Phaky::findOrFail($id);
        $tencha = Phaky::select('hoten')->where('id',$phaky->vochong)->first();
        $doicon = Phaky::select('doithu')->where('id',$phaky->vochong)->first();
        return view ('Phaky.createcon', compact('phaky','tencha','doicon'));
    }

    public function store(Request $request){
        $Phaky = new Phaky();
        $Phaky->hoten = $request->hoten;   
        $Phaky->gioitinh = $request->gioitinh;
        $Phaky->ngaysinh = $request->ngaysinh; 
        $Phaky->tinhtrang = $request->tinhtrang;
        $Phaky->ngaymat = $request->ngaymat;
        $Phaky->vochong = $request->vochong;
       
        $Phaky->save();
        if ($request->vochong) {
            $existingPhaky = Phaky::find($request->vochong);
            if ($existingPhaky) {
                if ($existingPhaky->vochong) {
                    $existingPhaky->vochong .= ',' . $Phaky->id; // Thêm ID mới vào cuối chuỗi
                } else {
                    $existingPhaky->vochong = (string)$Phaky->id; // Tạo chuỗi mới nếu trường vochong là null
                }
                $existingPhaky->save();
            }
        }
         return redirect()->route('Phaky.index')->with('addpksuccess', '');
    }
    public function update(Request $request, $id)
    {
        $data = [
            'hoten' => $request->input('hoten'),
            'gioitinh' => $request->input('gioitinh'),
            'ngaysinh' => $request->input('ngaysinh'),
            'ngaymat' => $request->input('ngaymat'),
        ];
        // Tìm đối tượng Phaky cần chỉnh sửa và cập nhật thông tin
        Phaky::findOrFail($id)->update($data);

            return redirect()->route('Phaky.index')->with('editpksuccess','');
    }
    public function storecon(Request $request){
        $Phaky = new Phaky();
        $Phaky->doithu = $request->doithu;   
        $Phaky->hoten = $request->hoten;   
        $Phaky->gioitinh = $request->gioitinh;
        $Phaky->ngaysinh = $request->ngaysinh;
        $Phaky->tinhtrang = $request->tinhtrang;
        $Phaky->ngaymat = $request->ngaymat;
        $Phaky->idcha = $request->idcha;
        $Phaky->idme = $request->idme;
        $Phaky->save();
        return redirect()->route('Phaky.index')->with('addpksuccess', '');
    }
    public function delete($id)
    {
        $phaky = Phaky::findOrFail($id);
        $phaky->delete();
        Phaky::where('idme', $id)->delete();
        if($phaky->gioitinh==0) Phaky::where('vochong', $id)->delete();
        Phaky::where('idcha', $id)->delete();


    
        return redirect()->route('Phaky.index')->with('deletesuccess', '');
    }
}