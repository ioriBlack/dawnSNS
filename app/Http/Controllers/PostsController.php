<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Post;
use App\Follow;
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
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->get();

        return view('posts.index',compact('posts'));
    }

    public function followsCount(){

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        return view('posts.index',compact('posts'))->with([
            "posts" => $posts,
            "follows_count" => $follows_count,
            "followers_count" => $followers_count,
        ]);
    }

    public function user()
    {
        $users = DB::table('users')->get();
        return view('posts.index',['users'=>$users]);
    }

    //    public function create()
    // {
    //         return view('post.create');
    // }



    public function followsList(){

        $my_follows = DB::table('follows')
            ->join('users','follows.follow_id','=','users.id')
            ->where('follower_id',Auth::id())
            ->select('username','users.id', 'users.images')
            ->get();

        $followsPosts = DB::table('follows')
            ->join('users','follows.follow_id','=','users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follower_id',Auth::id())
            ->select('follows.follow_id','users.id', 'users.username','users.images', 'posts.posts', 'posts.created_at')
            ->get();

        return view('follows.followList',compact('my_follows','followsPosts'));
    }
//
    public function followerList()
    {
        $my_followers = DB::table('follows')
            ->join('users','follows.follower_id','=','users.id')
            ->where('follows.follow_id',Auth::id())
            ->get();

        return view('follows.followerList',compact('my_followers'));
    }
    // public function followerList()
    // {
    //     $my_followers = DB::table('follows')
    //         ->join('users','follows.follower_id','=','users.id')
    //         ->where('id',Auth::id())
    //         ->get();

    //     $followers = DB::table('follows')
    //         ->join('users','follows.follower_id','=','users.id')
    //         ->select('follows.*','users.*')
    //         ->get();

    //     return view('follows.followerList',compact('my_followers','followers'));
    // }

    public function following()
    {
        DB::table('follows')
        ->insert(
            [
            'id' => Auth::id(),
            'follow_id' => 'follows.id',
            'follower_id' => Auth::id(),
            ]);

        return redirect('/search/following');
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

        public function index_delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

        public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/myProfile');
    }
}
