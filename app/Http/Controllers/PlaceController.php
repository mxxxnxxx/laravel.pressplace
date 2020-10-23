<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Place;
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
        
        

        
        // $place_image->save();

        // 投稿結果の詳細ページにリダイレクト
        return redirect()->route('place.show', ['id' => $place->id]);


    }
    public function update


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
        // $place_image = $place->place_images->filename;
        return view('place.show', ['place' => $place, 'place_images' => $place_images]);
    }
}
