<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ユーザーページ表示を行う記述
    public function show(Request $request){
        // 以下でユーザー情報をにゅうしゅしている
        $user = Auth::user();

        // ユーザ情報を元にviewを表示
        return view('user.show', [ 'auth' => $user ]);
    }
    
    // ユーザー情報の編集を行う変数に編集したい自分の$idを渡す
    // $idはurlパラメータ
    public function edit(Request $request, $id){
        // 受け取った$idでレコード検索
        $user = Auth::user($id);
        
        return view('user.edit', ['user' => $user ]);

    }
    // user画像を投稿するため
    public function store(Request $request){
    $request->validate([
        'name'=>['required','string','max:255'],
        'file_name'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
    ]);
    }
    // 実際にデータベースに情報を更新
    public function update($id){
        // 対象レコード取得

        $user = User::find($id);

        // リクエストデータ受取

        $form = $request->all();

        // フォームトークン削除

        unset($form['_token']);

        // レコードアップデート

        $user->fill($form)->save();

        // ユーザーページに戻す
        return redirect('/user/{id}');

    }
    
    
}