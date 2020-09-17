<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ユーザーページ表示を行う記述

    // 以下でユーザー情報をにゅうしゅしている
    $user = Auth::user();
    
    // ユーザ情報を元にviewを表示
    return view('user.index',['auth' => $user]);
    
    
}
