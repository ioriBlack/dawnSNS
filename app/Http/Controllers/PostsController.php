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
            ->orderBy('posts.create_at','desc')
            ->get();

        $my_posts= DB::table('posts')
        ->where('user_id',Auth::id())->get();

        $images = DB::table('users')
        ->where('users.id',Auth::id())
        ->get();

        return view('posts.index',compact('posts','my_posts','images'));
    }

    public function followsCount_index(){

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follow_id',Auth::id())
            ->count();

        return view('posts.index',compact('posts'))->with([
            "posts" => $posts,
            "follows_count" => $follows_count,
            "followers_count" => $followers_count,
        ]);
    }
    public function followsCount_search(){

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.images')
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follow_id',Auth::id())
            ->count();

        return view('posts.search',compact('posts'))->with([
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
            ->orderBy('posts.created_at','desc')
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follow_id',Auth::id())
            ->count();

        return view('follows.followList',compact('my_follows','followsPosts','follows_count','followers_count'));
    }
//
    public function followerList()
    {
        $followersPosts = DB::table('follows')
            ->join('users','follows.follower_id','=','users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follow_id',Auth::id())
            ->select('follows.follower_id','users.id', 'users.username','users.images', 'posts.*')
            ->orderBy('posts.created_at','desc')
            ->get();

        $follows_count = DB::table('follows')
            ->where('follower_id',Auth::id())
            ->count();

        $followers_count = DB::table('follows')
            ->where('follow_id',Auth::id())
            ->count();

        $my_followers = DB::table('follows')
            ->join('users','follows.follower_id','=','users.id')
            ->where('follows.follow_id',Auth::id())
            ->get();

        return view('follows.followerList',compact('my_followers','follows_count','followers_count','followersPosts'));
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

    public function create_modal(Request $request){
        $post = $request->input('post');
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post,
            'created_at' => now(),
            'follows_id' =>Auth::id(),
        ]);

        return redirect('/top');
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'post' => $post
        ]);
        return redirect('/index');
    }
    // public function updateForm($id)
    // {
    //     $post = DB::table('posts')
    //         ->where('id', $id)
    //         ->first();
    //     return view('posts.updateForm', ['post' => $post]);
    // }



        public function update_top(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('post');
            DB::table('posts')
                ->where('id', $id)
                ->update(
                    ['post' => $up_post]
            );

        return back();
    }
    //     public function update(Request $request)
    // {
    //     $id = $request->input('id');
    //     $up_post = $request->input('upPost');
    //     DB::table('posts')
    //         ->where('id', $id)
    //         ->update(
    //             ['posts' => $up_post]
    //         );

    //     return redirect('/top',compact('id','post'));
    // }

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

        public function updateForm($id)
    {
        $post_up = DB::table('posts')
            ->where('id', $id)
            ->get();

        return view('/top', compact('post_up'));
    }

        public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('post');
        DB::table('posts')
            ->where('id', $id)
            ->update([
                'posts' => $up_post,
            ]);

        return back();
    }
}
