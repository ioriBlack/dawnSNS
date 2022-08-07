<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use App\Tweet;
use App\Follower;

class UsersController extends Controller
{

    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        if(request('keyword')){
            $keyword = $request->input('keyword');
            $users = DB::table('users')
            ->where('username','LIKE',"%{$keyword}%")
            ->get();
        }else{
            $users = DB::table('users')
            ->get();
        }
        return view('posts.search',compact('users','keyword'));
    }

    public function userList(){
        //= User::はusersテーブルと紐付いている？？
        $users = User::where("id" , "!=" , Auth::user()->id)->paginate(10);

        // $users = DB::table('users')
        // ->where("Auth::id()", '!=','$users_table')
        // ->get();

        return view('posts.search',compact('users'));
    }

    public function following_search(Request $request){
        $following = $request->input('id');

        DB::table('follows')
        ->insert([
            'follower_id'=>Auth::id(),
            'follow_id'=>$following,
        ]);

        return back();
    }

    public function following_follows(Request $request){
        $following = $request->input('id');



        DB::table('follows')
        ->insert([
            'follower_id'=>Auth::id(),
            'follow_id'=>$following,
        ]);

        return back();
    }


    public function profile_user(Request $request){

        $id = $request->input('id');
        $name = $request->input('name');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $iconName = $request->file('icon')->getClientOriginalName();
        $request->file('icon')->storeAs('public/images', $iconName);

        DB::table('users')
        ->where('id',$id)
        ->update([
            'username' => $name,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $iconName,
        ]);
        return back();
    }

    public function followsProfile($id){
        DB::table('follows')
            ->join('users','follows.follow_id','=','users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follower_id',$id)
            ->select('follows.follow_id','users.id', 'users.username','users.images', 'posts.posts', 'posts.created_at')
            ->get();

        return redirect('/{id}/followsProfile');
    }

    public function users(){
        $users = DB::table('users')
            ->where('id', Auth::id())
            ->first();

        return view('users.profile',compact('users'));
    }
}
