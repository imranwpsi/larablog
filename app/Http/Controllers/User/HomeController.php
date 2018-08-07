<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$posts = Post::take(6)->where('status',1)->get();
    	$latest_posts = Post::take(6)->where('status',1)->orderBy('id','desc')->get();
    	return view('user.index', compact('posts','latest_posts'));
    }
    public function show_all_letest_post(){
    	$latest_posts = Post::where('status',1)->orderBy('id','desc')->paginate(2);
    	return view('user.latest_post_list', compact('latest_posts'));
    }
}
