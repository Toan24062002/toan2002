<?php

namespace App\Http\Controllers;
use App\Models\News;
 
use Illuminate\Http\Request;  

class NewsController extends Controller
{
    public function index()
    {
        $News = News::all();
        return view('News.index',compact('News'));
    } 
    public function chitiettin($id){
        $News = News::findOrFail($id);
        return view('Home.chitiettin', compact('News'));
    }

public function add()
    {
        return view('News.create');
    }
    public function store(Request $request){
        $request->validate([ 
            'tieude' => 'required|string|max:255',
            'loai' => 'required',
            'anhdaidien' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'noidung' => 'required|string',
        ]);
    
        // Lưu ảnh vào thư mục public/images
        $imageName = time().'.'.$request->anhdaidien->extension();
        $request->anhdaidien->move(public_path('images'), $imageName);
    
        // Tạo mới bản ghi trong bảng News
        $news = new News();
        $news->tieude = $request->tieude;
        $news->loai = $request->loai;
        $news->anhdaidien = $imageName;
        $news->noidung = $request->noidung;
        $news->save();
        return redirect()->route('News.index')->with('addsuccess', '');

    }
    public function update(Request $request, $id){
        $request->validate([ 
            'tieude' => 'required|string|max:255',
            'loai' => 'required',
            'anhdaidien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'noidung' => 'required|string',
        ]);
    
        // Tìm bản ghi cần cập nhật
        $news = News::findOrFail($id);
    
        // Lưu ảnh mới vào thư mục public/images nếu có
        if($request->hasFile('anhdaidien')){
            $imageName = time().'.'.$request->anhdaidien->extension();
            $request->anhdaidien->move(public_path('images'), $imageName);
            
        
    
            $news->anhdaidien = $imageName;
        }
    
        // Cập nhật thông tin khác
        $news->tieude = $request->tieude;
        $news->loai = $request->loai;
        $news->noidung = $request->noidung;
        $news->save();
        
        return redirect()->route('News.index')->with('udnewsuccess', '');
    }
    public function delete($id)
    {
        $news = News::findOrFail($id);

        // Xóa hình ảnh từ thư mục lưu trữ
    
        // Xóa hình ảnh từ cơ sở dữ liệu
        $news->delete();

        return redirect()->route('News.index')->with('deleteimgsuccess', '');
    }
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('News.edit', compact('news'));
    }
    
}