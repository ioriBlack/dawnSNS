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
        }elseif(request('keyword','=','empty')){
            $users = DB::table('users')
            ->get();
        }

        $check = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        return view('posts.search',compact('users','keyword','check','follows_count','followers_count'));
    }

    public function userList(){
        //= User::はusersテーブルと紐付いている？？
        $users = User::where("id" , "!=" , Auth::user()->id)->paginate(10);

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $users_table = DB::table('users')
            ->get();

        $check = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->get();

        // $users = DB::table('users')
        // ->where("Auth::id()", '!=','$users_table')
        // ->get();

        return view('posts.search',compact('users','check','users_table','follows_count','followers_count'));
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

    public function unFollow_search(Request $request){
        $unFollow = $request->input('id');

        DB::table('follows')
            ->where('follow_id',$unFollow)
            ->where('follow_id',$unFollow)
            ->delete();

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
        if($request->file('icon')){
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
        ]);}
        else{
        DB::table('users')
            ->where('id',$id)
            ->update([
            'username' => $name,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            ]);}
        return back();
    }

    public function followsProfile($id){
       $followsProfile = DB::table('follows')
            ->join('users','follows.follow_id','=','users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follow_id',$id)
            ->select('follows.follow_id','users.id', 'users.username','users.images', 'posts.posts', 'posts.created_at')
            ->get();

        $check = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->get();

        $images = DB::table('users')
        ->where('id',$id)
        ->first();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        return view('users.followsProfile',compact('followsProfile','follows_count','followers_count','images','check'));
    }

    // public function followsProfile($id){
    //    $followsProfile = DB::table('follows')
    //         ->join('users','follows.follow_id','=','users.id')
    //         ->join('posts', 'users.id', '=', 'posts.user_id')
    //         ->where('follower_id',$id)
    //         ->select('follows.follow_id','users.id', 'users.username','users.images', 'posts.posts', 'posts.created_at')
    //         ->get();

    //     return view('users.followsProfile',compact('followsProfile'));
    // }

    public function myProfile($id){
        $myProfiles = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->where('follower_id',$id)
            ->get();

        return view('users.myProfile',compact('myProfiles'));
    }

    public function myProfile_type(){
        $myProfiles = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->where('user_id',Auth::id())
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

            return view('users.myProfile',compact('myProfiles','follows_count','followers_count'));
    }

    public function users(){
        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();
        $users = DB::table('users')
            ->where('id', Auth::id())
            ->first();

        return view('users.profile',compact('users','follows_count','followers_count'));
    }

    public function getLogout(){
        Auth::logout();
        return view('auth.register');
    }
}
