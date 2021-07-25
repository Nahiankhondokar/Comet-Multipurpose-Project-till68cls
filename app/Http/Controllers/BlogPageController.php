<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    
    /**
     * Blog page show
     */
    public function ShowBlogPage(){
        $all_posts = Post::where('status', '=', true) -> Where('trash', '=', false) -> latest() -> paginate(3);
        return view('comet.blog', [
            'all_posts'         => $all_posts
        ]);


    }


    /**
     *  Blog Search
     */
    public function blogSearch(Request $request){

        $search = $request -> search;

        $posts = Post::where('title', 'LIKE', '%' . $search . '%') -> orWhere('content', 'LIKE', '%' . $search . '%') -> latest() -> paginate();

        return view('comet.blog-search',[
            'all_posts'      => $posts
        ]);

    }



    /**
     *  Blog Search by Category
     */
    public function blogSearchByCat($slug){
        
        $cats = Category::where('slug', $slug) -> first();

        return view('comet.category-blog', [
            'all_posts'     => $cats -> posts
        ]);

    }



    /**
     *  Single Blog Show
     */
    public function blogSingle($slug){

        $single_post = Post::where('slug', $slug) -> first();
        $this -> viewCount($single_post -> id);
        return view('comet.blog-single', compact('single_post'));
    }


    /**
     * post view count
     */
    private function viewCount($post_id){
        // post views count
        $post_views_count = Post::find($post_id);
        $old_view = $post_views_count -> views;
        $post_views_count -> views = $old_view + 1;
        $post_views_count -> update();
    }


}
