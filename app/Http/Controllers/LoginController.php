<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Admin;

class LoginController extends Controller
{
   public function index()
    {
        $password=$_POST['password'];
        $admin_id=$_POST['admin_id'];
        $err=[];

        if(empty($password)==false)
        {
            $regex_password='/^\d+$/';
            if(!preg_match($regex_password,$password)){
                $err['password']="パスワードの種類が間違っています";
            }
        }
        else{
            $err['password']="パスワードが空です";
        }
        if(empty($admin_id)==true)
        {
            $err['admin_id']="あなたのIDは空です";
        }

        $input_arr=
            [
                'admin_id'=>$admin_id,
                'password'=>$password
            ];
        if(count($err)>0){
            
            return view('login.index',['err'=>$err, 'input'=>$input_arr]);
        }
        else{
            $check_exist=Admin::selectRaw("count(*) as count")->where("admin_id","=",$admin_id)->where("password","=",$password)->first()->toArray();
            if($check_exist['count']==1)
            {
                return view('admin.index');
            }
            else{
                $err['login']="IDまたはパスワードが間違っています";
                return view('login.index',['err'=>$err, 'input'=>$input_arr]);
            }
            
        }


    }
}