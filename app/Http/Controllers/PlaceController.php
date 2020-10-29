<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Place;
use App\Tag;
// 以下いらない？
// use App\Place_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    // 投稿
    public function create(){
        return view('place.new');
    }
    // データベースへ保存
    public function store( PlaceRequest $request){
        $place = Place::create(
            [
                'user_id' => Auth::id(),
                'name'    => $request->name,
                'comment' => $request->comment,
                'address' => $request->address
                ]);
        // $place_image = new Place_image;
        // $place->user_id = Auth::id();
        // $place->name = $request->name;
        // $place->comment = $request->comment;
        // $place->address = $request->address;
        // $place->save();

        // 画像の処理
        $PlaceImages = $request->file('place_image');

        // 繰り返し
            if(isset($PlaceImages)){

                // foreach ($PlaceImages as $index => $i) {
                    $img = \Image::make($PlaceImages);
                    // resize
                    $img->fit(100, 100, function ($constraint) {
                        $constraint->upsize();
                    });
                    $extension = $PlaceImages->getClientOriginalExtension();
                    $file_name = "{$request->name}_{$place->user_id}.{$extension}";
                    $save_path =  storage_path('app/public/place_image/' . $file_name);
                    $img->save($save_path);
                    $place->place_images()->create(['filename' => $file_name]);
                
            }
        // tagの処理
        // preg_match_allを使用して#タグのついた文字列を取得している多次元配列
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);

        // 受けようの配列を定義しnameカラムへ保存される値を受ける
        $tags = [];

        // $matchの中でも#が付いていない方を使用する(配列番号で言うと1)
        foreach ($match[1] as $tag) {
            // firstOrCreateで重複を防ぎながらタグを作成している。
            $record = Tag::firstOrCreate(['name' => $tag]);
            // 受け皿に入れる
            array_push($tags, $record);
        }

        // 多対多の中間テーブル用の記述
        // タグのidを中間テーブにいれるための受け皿
       $tags_id = [];
    //    $tagにはテーブルに入る時の情報もすでにもっているので$tag->idがつかえる
       foreach($tags as $tag) {
           // Tag::firstOrCreate(['name' => $tag])でつくられたtagのidを取得してplace_tagテーブル用の$tags_idに入れる
           array_push($tags_id, $tag->id);
       }




        // タグはpostがsaveされた後にattachするように。
        // $place（今作った投稿）に紐づけるとするために->tags()でしてい
        // 定義した$placeのid(place_id)と多対多の関係のtag(tag_id)を紐付けるための記述
       $place->tags()->attach($tags_id);

        // 投稿結果の詳細ページにリダイレクト
        return redirect()->route('place.show', ['id' => $place->id]);
    }

    public function edit($id){
        $place = Place::find($id);
        return view('place.edit', ['place' => $place]);
        
        
    }

    public function update(PlaceRequest $request, $id){
        $place = Place::find($id);
        $place->name = $request->name;
        $place->comment = $request->comment;
        $place->address = $request->address;
        $place->save();
        $PlaceImages = $request->file('place_image');

        // 繰り返し
        if (isset($PlaceImages)) {

            // foreach ($PlaceImages as $index => $i) {
            $img = \Image::make($PlaceImages);
            // resize
            $img->fit(100, 100, function ($constraint) {
                $constraint->upsize();
            });
            $extension = $PlaceImages->getClientOriginalExtension();
            $file_name = "{$request->name}_{$place->user_id}.{$extension}";
            $save_path =  storage_path('app/public/place_image/' . $file_name);
            $img->save($save_path);
            $place->place_images()->create(['filename' => $file_name]);
        }

        // tagの処理
        // preg_match_allを使用して#タグのついた文字列を取得している多次元配列
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);

        // 編集前のtagを変数に格納
        $before = [];
        foreach ($place->tags as $tag) {
            array_push($before, $tag->name);
        }
        // 変更後のtagsの受け皿
        $after = [];
        // $matchの中でも#が付いていない方を使用する(配列番号で言うと1)
        foreach ($match[1] as $tag) {
            // firstOrCreateで重複を防ぎながらタグを作成している。
            $record = Tag::firstOrCreate(['name' => $tag]);
            // 受け皿に入れる
            array_push($after, $record);
        }

        // 多対多の中間テーブル用の記述
        // タグのidを中間テーブにいれるための受け皿
        $tags_id = [];
        // 更新前のtagsを新しいidにする処理
        foreach($after as $tag) {
            // 前のidを $tags_idにいれる
            array_push($tags_id, $tag->id);
        }
        // syncで同期して 紐付けの追加,中間テーブルの値更,新紐付けの解除を同時におこなっている
        $place->tags()->sync($tags_id);


        // リダイレクトshow
        return redirect()->route('place.show', ['id' => $place->id]);
    }


    // 一覧
    public function index(){
        $places = Place::orderBy('created_at', 'desc')
        ->paginate(15);

        // $place_images = $places->place_images;
        return view('place.top', ['places' => $places]);
    }
    // 詳細ページ
    public function show($id){
        $place = Place::find($id);
        $place_images = $place->place_images;
        $user = \Auth::user();
            if ($user) {
                $login_user_id = $user->id;
            } else {
                $login_user_id = "";
            }
        // $place_image = $place->place_images->filename;
        return view('place.show', ['place' => $place, 'place_images' => $place_images, 'login_user_id' => $login_user_id]);
    }

    // ソフトデリート確認画面表示
    public function confirmationSoftdelete($id)
    {
        $place = Place::find($id);
        return view('place.confirmationSoftdelete', ['place' => $place]);
    }

    // ソフトデリート
    public function softdelete($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect()->to('/');
    }
}
