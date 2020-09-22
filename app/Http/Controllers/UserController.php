<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ユーザーページ表示を行う記述
    public function index(){
        // 以下でユーザー情報をにゅうしゅしている
        $user = Auth::user();

        // ユーザ情報を元にviewを表示
        return view('user.index', [ 'auth' => $user ]);
    }
    
    // ユーザー情報の編集を行う変数に編集したい自分の$idを渡す
    // $idはurlパラメータ
    public function edit($id){
        // 受け取った$idでレコード検索
        $user = Auth::findOrFail($id);
        
        return view('user.edit', ['user' => $user ]);

    }
    
    
}
