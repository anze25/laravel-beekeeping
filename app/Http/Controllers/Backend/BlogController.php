<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use App\Models\BlogPost;
use Image;

class BlogController extends Controller
{
	public function BlogCategory()
	{

		$blogcategory = BlogPostCategory::latest()->get();
		return view('backend.blog.category.category_view', compact('blogcategory'));
	}


	public function BlogCategoryStore(Request $request)
	{

		$request->validate([
			'blog_category_name_en' => 'required',
			'blog_category_name_slo' => 'required',

		], [
			'blog_category_name_en.required' => 'Input Blog Category English Name',
			'blog_category_name_slo.required' => 'Input Blog Category Slovenian Name',
		]);



		BlogPostCategory::insert([
			'blog_category_name_en' => $request->blog_category_name_en,
			'blog_category_name_slo' => $request->blog_category_name_slo,
			'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
			'blog_category_slug_slo' => str_replace(' ', '-', $request->blog_category_name_slo),
			'created_at' => Carbon::now(),


		]);

		$notification = array(
			'message' => 'Blog Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 



	public function BlogCategoryEdit($id)
	{

		$blogcategory = BlogPostCategory::findOrFail($id);
		return view('backend.blog.category.category_edit', compact('blogcategory'));
	}




	public function BlogCategoryUpdate(Request $request)
	{

		$blogcar_id = $request->id;


		BlogPostCategory::findOrFail($blogcar_id)->update([
			'blog_category_name_en' => $request->blog_category_name_en,
			'blog_category_name_slo' => $request->blog_category_name_slo,
			'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
			'blog_category_slug_slo' => str_replace(' ', '-', $request->blog_category_name_slo),
			'created_at' => Carbon::now(),


		]);

		$notification = array(
			'message' => 'Blog Category Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('blog.category')->with($notification);
	} // end method 




	///////////////////////////// Blog Post ALL Methods //////////////////

	public function ListBlogPost()
	{
		$blogpost = BlogPost::with('category')->latest()->get();
		return view('backend.blog.post.post_list', compact('blogpost'));
	}


	public function AddBlogPost()
	{

		$blogcategory = BlogPostCategory::latest()->get();
		$blogpost = BlogPost::latest()->get();
		return view('backend.blog.post.post_add', compact('blogpost', 'blogcategory'));
	}


	public function BlogPostStore(Request $request)
	{

		$request->validate([
			'post_title_en' => 'required',
			'post_title_slo' => 'required',
			'category_id' => 'required',
			'post_details_en' => 'required',
			'post_details_slo' => 'required',

		], [
			'post_title_en.required' => 'Input Post Title English Name',
			'post_title_slo.required' => 'Input Post Title Slovenian Name',
			'post_details_en.required' => 'Input Post Details English',
			'post_details_slo.required' => 'Input Post Details Slovenian',
		]);

		$requested_image = $request->file('post_image');
		$image_path = public_path('frontend/images/posts/');
		$thumbs_path = public_path('frontend/images/posts/thumbs/');
		$name_gen = $requested_image->getClientOriginalName();
		$image = Image::make($requested_image);
		if (!file_exists($image_path)) {
			mkdir($image_path, 666, true);
		}
		if (!file_exists($thumbs_path)) {
			mkdir($thumbs_path, 666, true);
		}

		$image->resize('1000', '1000', function ($constraint) {
			$constraint->aspectRatio();
		})->resizeCanvas(890, 480, 'center', false, '#ffffff')->save($image_path .  $name_gen)
			->resize(400, 400, function ($constraint) {
				$constraint->aspectRatio();
			})->resizeCanvas(400, 200, 'center', false, '#ffffff')
			->save($image_path . 'thumbs/' . $name_gen)
			->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->resizeCanvas(70, 70, 'center', false, '#ffffff')
			->save($image_path . 'thumbs/70px_' . $name_gen);


		BlogPost::insert([
			'category_id' => $request->category_id,
			'post_title_en' => $request->post_title_en,
			'post_title_slo' => $request->post_title_slo,
			'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
			'post_slug_slo' => str_replace(' ', '-', $request->post_title_slo),
			'post_image' => $name_gen,
			'post_details_en' => $request->post_details_en,
			'post_details_slo' => $request->post_details_slo,
			'created_at' => Carbon::now(),

		]);

		$notification = array(
			'message' => 'Blog Post Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('list.post')->with($notification);
	}

	public function BlogPostEdit($id)
	{

		$blogPost = BlogPost::findOrFail($id);
		$blogCategory = BlogPostCategory::latest()->get();
		return view('backend.blog.post.post_edit', compact('blogPost', 'blogCategory'));
	}

	public function BlogPostUpdate(Request $request)
	{
		$request->validate([
			'post_title_en' => 'required',
			'post_title_slo' => 'required',
			'category_id' => 'required',
			'post_details_en' => 'required',
			'post_details_slo' => 'required',

		], [
			'post_title_en.required' => 'Input Post Title English Name',
			'post_title_slo.required' => 'Input Post Title Slovenian Name',
			'post_details_en.required' => 'Input Post Details English',
			'post_details_slo.required' => 'Input Post Details Slovenian',
		]);

		$post_id = $request->id;
		$old_img = $request->old_img;

		if ($request->file('post_image')) {

			$old_image = 'frontend/images/posts/' . $old_img;
			$old_thumb = 'frontend/images/posts/thumbs/' . $old_img;
			if ($old_image) {
				unlink($old_image);
			}
			if ($old_thumb) {
				unlink($old_thumb);
			}
			$image = $request->file('post_image');
			$name_gen = $image->getClientOriginalName();
			$image = Image::make($image);

			$image_path = public_path('frontend/images/posts/');
			$thumbs_path = public_path('frontend/images/posts/thumbs/');
			$image->resize('1000', '1000', function ($constraint) {
				$constraint->aspectRatio();
			})->resizeCanvas(890, 480, 'center', false, '#ffffff')->save($image_path .  $name_gen)
				->resize(400, 400, function ($constraint) {
					$constraint->aspectRatio();
				})->resizeCanvas(400, 200, 'center', false, '#ffffff')
				->save($thumbs_path . $name_gen)
				->resize(200, 200, function ($constraint) {
					$constraint->aspectRatio();
				})->resizeCanvas(70, 70, 'center', false, '#ffffff')
				->save($thumbs_path . '70px_' . $name_gen);

			BlogPost::findOrFail($post_id)->update([
				'category_id' => $request->category_id,
				'post_title_en' => $request->post_title_en,
				'post_title_slo' => $request->post_title_slo,
				'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
				'post_slug_slo' => str_replace(' ', '-', $request->post_title_slo),
				'post_image' => $name_gen,
				'post_details_en' => $request->post_details_en,
				'post_details_slo' => $request->post_details_slo,
				'created_at' => Carbon::now(),

			]);

			$notification = array(
				'message' => 'Blog Post Successfully',
				'alert-type' => 'info'
			);

			return redirect()->route('list.post')->with($notification);
		} else {

			BlogPost::findOrFail($post_id)->update([
				'category_id' => $request->category_id,
				'post_title_en' => $request->post_title_en,
				'post_title_slo' => $request->post_title_slo,
				'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
				'post_slug_slo' => str_replace(' ', '-', $request->post_title_slo),
				'post_details_en' => $request->post_details_en,
				'post_details_slo' => $request->post_details_slo,
				'created_at' => Carbon::now(),

			]);

			$notification = array(
				'message' => 'Blog Post Updated Successfully',
				'alert-type' => 'info'
			);

			return redirect()->route('list.post')->with($notification);
		} // end else 
	} // end method 

	// Blog Image Update /// 


	public function BlogPostDelete($id)
	{

		$blogPost = BlogPost::findOrFail($id);
		$image = $blogPost->post_image;
		$old_image = 'frontend/images/posts/' . $image;
		$old_thumb = 'frontend/images/posts/thumbs/' . $image;
		if ($old_image) {
			unlink($old_image);
		}
		if ($old_thumb) {
			unlink($old_thumb);
		}

		BlogPost::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Blog Post Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end method 
}
