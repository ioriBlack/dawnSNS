<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        //return view('posts.index');
        //上記は一度コメントアウトしてDAWNから下記の記述を流用

        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }

    //    public function create()
    // {
    //         return view('post.create');
    // }


    public function followerList()
    {
        $followers = DB::table('follows')->get();
        return view('follows.followerList',['followers' => $followers]);
    }

    public function follower(Request $request)
    {
        $follows = $request->input('newFollower');
        DB::table('follows')->insert(
        [
         'id' => Auth::id(),
         'follow_id' => Auth::id(),
         'follower_id' => Auth::id(),
         'user_id' => Auth::id(),
         'username' => $follows,
        ]);

        return redirect('/followerList');
    }

    public function createForm()
    {
        return view('posts.createForm');
    }

       public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post,
            'created_at' => now(),
            'follows_id' =>Auth::id(),
        ]);

        return redirect('/createForm');
    }

    public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', ['post' => $post]);
    }

        public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );

        return redirect('/top');
    }

        public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    //     public function index(Post $user)
    // {
    //         $user = new User;
    // $all_users = $user->getAllUsers(auth()->user()->id);

    //     return view('posts.index', [
    //         'all_users'  => $all_users
    //     ]);
    // }
}
