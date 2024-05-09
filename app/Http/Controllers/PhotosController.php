<?php

namespace App\Http\Controllers;
use App\Models\Photos;
use Illuminate\Http\Request;
use DB;

class PhotosController extends Controller
{ 
    public function index()
    {
        $photo = Photos::all();
        return view("photos.index",compact('photo'));
    }
    public function create()
    {
        return view("photos.create");
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'tieude' => 'required',
            'tenanh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'loai' => 'required|in:2,3'
        ]);

        // Retrieve id_tailen from session
        $id_tailen = session()->get('id');

        // Handle the uploaded image
        $imageName = time().'.'.$request->tenanh->extension();  
        $request->tenanh->move(public_path('images'), $imageName);

        // Store data into the database
        DB::table('photos')->insert([
            'id_tailen' => $id_tailen,
            'tieude' => $request->tieude,
            'tenanh' => $imageName,
            'loai' => $request->loai
        ]);

        return redirect()->route('photos.index')->with('addimgsuccess','');
    }
    public function delete($id)
{
    // Tìm bản ghi cần xóa
    $photo = Photos::findOrFail($id);

    // Xóa tệp ảnh từ thư mục public/images
    $imagePath = public_path('images/' . $photo->tenanh);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Xóa bản ghi từ cơ sở dữ liệu
    $photo->delete();

    return redirect()->route('photos.index')->with('deleteimgsuccess', '');
}
}
