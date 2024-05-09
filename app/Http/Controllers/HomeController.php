<?php

namespace App\Http\Controllers;
use App\Models\Intro;
use App\Models\News; 
use App\Models\Phaky; 
use App\Models\Photos; 
use App\Models\Account; 
use App\Models\SlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $intro = Intro::first();
        $slide = SlideImage::all();
        $news = News::all(); 
        // Hoặc bất kỳ phương thức truy vấn nào khác để lấy bản ghi bạn muốn hiển thị
        return view('home.index', compact('intro','slide','news'));

    }
    public function News(){ 
        $news = News::all(); 
        return view('home.news', compact('news'));

    }
    public function Photos(){ 
        $photo = Photos::all(); 
        return view('home.thuvien', compact('photo'));

    }
    public function Phutho()
    { 
        return view('home.phutho');

    }
    public function kiemtradangnhap(Request $request){
        $user_name = $request->input('user_name');
        $pass = $request->input('pass');   
        $account = Account::where('user_name', $user_name)->where('pass', $pass)->first();
    
        if ($account) {
            
            $role=$account->quyen;
            $id=$account->id;

            // Đăng nhập thành công, lưu thông tin đăng nhập vào session
            $request->session()->put('id', $id);
            $request->session()->put('user_name', $user_name);
            $request->session()->put('role', $role);
            // Redirect hoặc trả về response thành công
            return redirect()->route('account.index')->with('loginsuccess', '');
        } 
        else
        {
            // Đăng nhập không thành công, redirect hoặc trả về response thất bại
            return redirect()->route('account.login')->with('error','');
        }
    }
    public function kiemtrauser(Request $request){
        $user_name = $request->input('user_name');
        $pass = $request->input('pass');   
        $account = Account::where('user_name', $user_name)->where('pass', $pass)->first();
    
        if ($account) {
            $role=$account->quyen;
            $id=$account->id;
            // Đăng nhập thành công, lưu thông tin đăng nhập vào session
            $request->session()->put('id', $id);
            $request->session()->put('user_name', $user_name);
            $request->session()->put('role', $role);
            // Redirect hoặc trả về response thành công
            return redirect()->route('home.phaky')->with('loginsuccess', '');
        } 
        else
        {
            // Đăng nhập không thành công, redirect hoặc trả về response thất bại
            return redirect()->route('account.login_user')->with('error','');
        }
    }
    
    public function logout(Request $request){
       
        if( $request->session()->get('role')==1)
        {
            $request->session()->forget('user_name');
            $request->session()->forget('role');
            return redirect()->route('account.login');
        }
        else
        {
            $request->session()->forget('user_name');
            $request->session()->forget('role');
            return redirect()->route('home.index');
        } 

    }
    
    public function showpk() 
    {
        $phakys = Phaky::select('*')->orderBy('gioitinh')->orderBy('idme')->orderBy('idcha')->get();
        $phakyDetails = [];
    
    foreach ($phakys as $phaky) {
        $id = $phaky->id;
        $fid = $phaky->idcha;
        $mid = $phaky->idme;
        $pids = ($phaky->vochong != '' && $phaky->vochong != null)?explode(',',$phaky->vochong):[];
        $gender = ($phaky->gioitinh == 0) ? 'male' : 'female';
        $photo = $phaky->anhdaidien ? asset('public/icon/' . $phaky->anhdaidien) : asset('public/icon/' . ($phaky->gioitinh == 0 ? 'nam.jpg' : 'nu.jpg'));
        $level = $phaky->doithu;
        $name = $phaky->hoten;
        $birthDate = $phaky->ngaysinh;
        $deathDate = $phaky->ngaymat;
        $birthanddeath = $birthDate . ' - ' . $deathDate;
        
        // Lưu các thông tin vào một mảng
        $phakyDetails[] = [
            'id' => $id,
            'fid' => $fid,
            'mid' => $mid,
            'pids' => $pids,
            'level' => $level,
            'name' => $name,
            'gender' => $gender,
            'photo' => $photo,
            'birthDate' => $birthDate,
            'deathDate' => $deathDate,
            'birthanddeath'=>$birthanddeath

        ];
    }     //dd ($phakyDetails);

    
    return view('home.phaky', compact('phakyDetails'));
    }
    public function PhaKyLienQuan($args_phaky,$ID)
    {
        
        $status=false;
        DB::beginTransaction();
        try
        {
            $danhsach=phaky::select('*')->where('id',$ID)->first();
            if($danhsach)
            {
                $args_phaky->push($danhsach);
                $arr_vkck = explore(',',$danhsach->vochong);
                $dsach_vkck = phaky::select('*')->whereIn('id', $arr_vkck)->get();
                if(count($dsach_vkck)>0)
                {
                    foreach($dsach_vkck as $key=>$val)
                    {
                        $args_phaky->push($dsach_vkck[$key]);
                    }
                    if ($danhsach->gioitinh==0)
                    {
                        $dsachcon = phaky::select('id')->where('idcha',$ID)->get()->toArray();
                        if(count($dsachcon)>0)
                        {
                            foreach($dsachcon as $key=>$val)
                            {
                                $this->PhaKyLienQuan($args_phaky,$val);
                            }
                        }
                    }
                }
            }
            $status=true;
            DB::commit();
        }catch(\Exception $ex){
            $status=false;
            DB::rollback();
        }
        return $args_phaky;
    }
    
}
?>