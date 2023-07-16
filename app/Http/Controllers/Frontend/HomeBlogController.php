<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;

class HomeBlogController extends Controller
{
	public function AddBlogPost()
	{

		$blogcategory = BlogPostCategory::with('posts')->has('posts')->orderBy('blog_category_name_en', 'asc')->latest()->get(); // only categories that have posts
		$blogpost = BlogPost::latest()->paginate(6);
		$latest = BlogPost::latest()->limit(5)->get();
		return view('frontend.blog.blog_list', compact('blogpost', 'blogcategory', 'latest'));
	} // end method 


	public function DetailsBlogPost($id)
	{
		$post = BlogPost::where('id', $id)->firstOrFail();
		$blogCategories = BlogPostCategory::with('posts')->has('posts')->orderBy('blog_category_name_en', 'asc')->latest()->get(); // only categories that have posts
		$blogCategory = $post->category_id;
		$blogPost = BlogPost::findOrFail($id);
		$relatedPosts = BlogPost::where('category_id', $blogCategory)->limit(2)->get();
		$latest = BlogPost::latest()->limit(5)->get();
		return view('frontend.blog.blog_details', compact('blogPost', 'blogCategories', 'relatedPosts', 'latest'));
	}



	public function HomeBlogCatPost($category_id)
	{
		$blogCategory = BlogPostCategory::findOrFail($category_id);
		$blogCategories = BlogPostCategory::with('posts')->has('posts')->orderBy('blog_category_name_en', 'asc')->latest()->get(); // only categories that have posts
		$blogpost = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(6);
		$latest = BlogPost::latest()->limit(5)->get();
		return view('frontend.blog.blog_cat_list', compact('blogpost', 'blogCategories', 'latest', 'blogCategory'));
	} // end mehtod 


}
