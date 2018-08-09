<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$posts = Post::take(6)->where('status',1)->orderBy('created_at','DESC')->get();
    	$latest_posts = Post::take(6)->where('status',1)->orderBy('created_at','DESC')->get();
    	return view('user.index', compact('posts','latest_posts'));
    }
    public function show_all_letest_post(){
    	$latest_posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(2);
    	return view('user.latest_post_list', compact('latest_posts'));
    }
    public function category(Category $category){
    	$latest_posts = $category->posts();
    	return view('user.latest_post_list', compact('latest_posts'));
    }
    public function tag(Tag $tag){
    	$latest_posts = $tag->posts();
    	return view('user.latest_post_list', compact('latest_posts'));
    }
}
