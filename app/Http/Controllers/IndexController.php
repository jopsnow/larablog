<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        // get the posts that are published, sort by decreasing order "id".
        $posts = Post::where('is_published', true)
                            ->orderBy('id', 'desc')
                            ->get();
        // get the features posts
        $featured_posts = Post::where('is_published', true)
                            ->where('is_featured', true)
                            ->orderBy('id', 'desc')
                            ->take(5)
                            ->get();
        // get all the categories 
        $categories = Category::all();

        // get all the tags
        $tags = Tag::all();

        // get the recent 5 posts 
        $recent_posts = Post::where('is_published', true)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // return the data to the corresponding view
        return view('home', array(
            'posts' => $posts,
            'featured_posts' => $featured_posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));
    }
}