<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    //Blog Pages (resource)
    public function create(){

        return view('pages.blog-create');
    }
    public function store(PostRequest $request){


        $post = Post::create([
            'title' => $request->title,
            'slug' => Post::makeslug($request->title),
            'context' => $request->context,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image' => $request->image_path,
        ]);


        $post->syncTags($request->tags ?? "");


        return redirect('/dashboard');
    }
    public function update(PostRequest $request, Post $post)
    {

        Gate::authorize('crud-post', $post);

        $imageToSave = $request->image_path ?? $post->image;

        if (!$imageToSave) {
            return back()->withErrors(['image' => 'Bir kapak fotoğrafı seçmek zorundasın knk!'])->withInput();
        }

        // Slug Çakışmasını Önleme
        $newSlug = $post->slug;
        if ($request->title !== $post->title) {
            $post->update(['slug' => 'temp-' . time()]);
            $newSlug = Post::makeslug($request->title);
        }

        // Ana Güncelleme
        $post->update([
            'title'       => $request->title,
            'slug'        => $newSlug,
            'context'     => $request->context,
            'excerpt'     => $request->excerpt,
            'category_id' => $request->category_id,
            'image'       => $imageToSave,
        ]);

        return redirect('/dashboard');
    }
    public function destroy(Post $post){

        Gate::authorize('crud-post', $post);

        $post->delete();

        return redirect(route('dashboard.view'));
    }
    public function show(Post $post)
    {
        $viewedPosts = session()->get('viewed_posts', []);

        if (!in_array($post->id, $viewedPosts)) {
            DB::table('posts')->where('id', $post->id)->increment('views');
            session()->push('viewed_posts', $post->id);


            $post->views += 1;
        }

        return view('pages.blog-detail', compact('post'));
    }
    public function edit(Post $post){

        Gate::authorize('crud-post', $post);

        return view('pages.blog-edit', compact('post'));
    }


    //Other Pages
    public function homepagePosts(){

        $posts = Post::with(['user','tags','category']);
        $recent = $posts->latest()->take(6)->get();
        $popular = $posts->orderBy('views', 'DESC')->take(3)->get();

        return view('pages.homepage',compact('recent','popular'));
    }

}
