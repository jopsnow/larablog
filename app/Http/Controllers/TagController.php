<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;

class TagController extends Controller
{
    public function index($slug)
    {
        // get the requested tag 
        $tag = Tag::query()->where('slug', $slug)->first();

        // get the posts with that tag 
        $posts = $tag->posts()->get();

        // get all the categories 
        $categories = Category::all();

        // get all the tags 
        $tags = Tag::all();

        // get the recent 5 posts 
        $recent_posts = Post::where('is_published', true)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
                            
        return view('tag', array(
            'tag' => $tag,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));
    }
}
