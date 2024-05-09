<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\SlideImage;
class SlideImageController extends Controller 
{
    public function create()
    {
        return view('slide.create');
    }
    public function index()
    {
        $slideimages = SlideImage::all(); 
        return view('slide.index', compact('slideimages'));
    }
    
    public function store(Request $request)
    { 
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra hình ảnh
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName); // Lưu trữ hình ảnh vào thư mục public/images

        $slideImage = new SlideImage();
        $slideImage->image_name = $imageName;
        $slideImage->save();

        return redirect()->route('slide.index')
                         ->with('addimgsuccess','');
    }
    public function delete($id)
{
    $slideImage = SlideImage::findOrFail($id);
    
    // Xóa hình ảnh từ thư mục lưu trữ
    Storage::delete('public/images/' . $slideImage->image_name);

    // Xóa hình ảnh từ cơ sở dữ liệu
    $slideImage->delete();

    return redirect()->route('slide.index')->with('deleteimgsuccess', '');
}

}