<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Models\Account;
class AccountController extends Controller 
{
    //
    public function login(){      
        return view('account.login');
    }
    public function login_user(){      
        return view('account.login_user');
    }
    public function index(){
        
        $accounts = Account::all();
        return view('account.index', compact('accounts'));
    }
     public function addacc(){
        return view ('account.create');
    }
    public function edit($id){
        $account = Account::findOrFail($id);
        return view('account.edit', compact('account')); 
    }
    public function delete($id){
        $account = Account::findOrFail($id);
    $account->delete();

    return redirect()->route('account.index')->with('deletesuccess', '');

    }
    public function store(Request $request){
        $Account = new Account(); 
        $Account->user_name = $request->user;   
        $Account->pass = $request->pass;
        $Account->quyen = $request->quyen;
        $Account->save();
        return redirect()->route('account.index')->with('addsuccess', '');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required',
            'pass' => 'required',
            'quyen' => 'required',
        ]);
    
        $account = Account::findOrFail($id);
    
        // Trích xuất dữ liệu từ request thành một mảng thuộc tính
        $data = [
            'user_name' => $request->user_name,
            'pass' => $request->pass,
            'quyen' => $request->quyen,
        ];
    
        // Cập nhật thuộc tính của đối tượng $account
        $account->update($data);
    
        return redirect()->route('account.index')->with('editsuccess','');
    }
} 
?>