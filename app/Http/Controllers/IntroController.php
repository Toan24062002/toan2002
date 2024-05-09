<?php

namespace App\Http\Controllers;
use App\Models\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller 
{
    public function show()
{
    $intro = Intro::first(); // Hoặc bất kỳ phương thức truy vấn nào khác để lấy bản ghi bạn muốn hiển thị
    return view('Intro.intro', compact('intro'));
}
    public function edit(){
        
        $intro = Intro::first(); // Hoặc bất kỳ phương thức truy vấn nào khác để lấy bản ghi bạn muốn chỉnh sửa
        return view('Intro.intro', compact('intro'));
    }
    public function store (Request $request)
    {
        $Intro = new Intro();
        $Intro->tieude = $request->tieude;   
        $Intro->noidung = $request->noidung;
        $Intro->save();
        return redirect()->route('Intro.intro')->with('addsuccess', '');
    }
    public function update(Request $request)
{
    $intro = Intro::first(); // Lấy bản ghi đầu tiên trong bảng intro
    $intro->tieude = $request->input('tieude'); // Cập nhật trường dữ liệu 'tieude'
    $intro->noidung = $request->input('noidung'); // Cập nhật trường dữ liệu 'noidung'
    $intro->save();

    return redirect()->back()->with('editintrosuccess', 'Cập nhật thông tin giới thiệu thành công.');
}
}

?>