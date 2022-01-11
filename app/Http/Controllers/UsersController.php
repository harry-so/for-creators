<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Item;
use App\User;
use App\Purchaser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $purchases = Purchaser::where("purchaser_id", $user->id)->get();
        $items = Item::where("user_id", $user->id)->orderby("published", "asc")->get();
        $sum = Purchaser::where("purchaser_id",$user->id)->sum("final_price");
        return view('profile', [
            'user'=> $user,
            'items'=>$items,
            'purchases' =>$purchases,
            'sum' => $sum,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view ('profile-edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // 'img' => 'required|file|image|max:2048',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //画像処理
        $file = $request->prof_img;
        
        // Eloquent モデル
        $user = User::find($request->id);
        
        //画像ファイルがあったら保存
        if (!empty($file)) {
            //拡張子取得
            $ext = $file->guessExtension();

            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;

            //画像のファイル名を任意のDBに保存
            $user->prof_img = $fileName;

            //public/uploadフォルダを作成
            $target_path = public_path('/users/');

            //ファイルをpublic/uploadフォルダに移動
            $file->move($target_path,$fileName);
        }

        $user->name = $request->name;
        $user->birth_year = $request->birth_year;
        $user->birth_month = $request->birth_month;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->title = $request->title;
        $user->website = $request->website;
        $user->id = Auth::id();
        $user->user_desc = $request->user_desc;
        $user->save();

        

        return redirect('/user/'.$user->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
