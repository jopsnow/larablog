<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;

class PostController extends Controller
{
    public function index($slug)
    {
        // get the requested post, if it is published
        $post = Post::query()->where('is_published', true)->where('slug', $slug)->first();

        // get all the categories 
        $categories = Category::all();

        // get all the tags 
        $tags = Tag::all();

        // get the recent 5 posts 
        $recent_posts = Post::where('is_published', true)->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // return the data to the corresponding view
        return view('post', array(
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));
    }   
}
