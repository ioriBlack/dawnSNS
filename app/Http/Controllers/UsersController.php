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
    //
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
        $users = DB::table('users')->get();
        return view('posts.search',compact('users'));
    }

    public function following(Request $request){
        $following = $request->input('id');

        DB::table('follows')
        ->insert([
            'follower_id'=>Auth::id(),
            'follow_id'=>$following,
        ]);

        return back();
    }

}
