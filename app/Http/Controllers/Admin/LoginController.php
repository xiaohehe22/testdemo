<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
require_once '/resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if($input=Input::all()){
            $code=Session::get('milkcaptcha');
            if($input['code']!=$code){
                return back()->with('msg','验证码错误');
            }else {
                echo '验证码正确，成功登陆';
            }
        }else{
            return view('admin.login');
        }
    }

    public function code(){
        //$code =new \Code;
        //$code->make();
        $test=new CaptchaBuilder;
        $test->build();
        $phrase=$test->getPhrase();
        Session::flash('milkcaptcha', $phrase);
        $test->output();
    }
    public function getcode(){
        //$code =new \Code;
        //$code->make();

        //another
        echo Session::get('milkcaptcha');
    }

}
