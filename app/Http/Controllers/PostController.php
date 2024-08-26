<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Image;
class PostController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->paginate(4);
        return view('home',compact('posts'));
    }
    public function create(){
        $tags = Tag::all();
        return view('create-post',compact('tags'));
    }
    public function edit($id){

        $post = Post::findorFail($id);
        $tags = Tag::all();
        $selectedTags = $post->tags->pluck('id')->toArray();
        return view('edit',compact('post','selectedTags','tags'));
    }
    public function createPosts(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to create a post.');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'

        ]);

        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' =>  auth()->id(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/' . $filename);

            // Use PHP GD library for image manipulation
            $src = imagecreatefromstring(file_get_contents($image->getRealPath()));
            $dst = imagecreatetruecolor(300, 300);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, 300, 300, imagesx($src), imagesy($src));
            imagejpeg($dst, $path);
            imagedestroy($src);
            imagedestroy($dst);

            $post->image = $filename;
        }
        $post->save();
// Attach selected tags to the post
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }


        return redirect()->back()->with('success', 'Post created successfully');
    }
public function editPosts(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
    $post->content = $request->content;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/uploads/' . $filename);

        // Use PHP GD library for image manipulation
        $src = imagecreatefromstring(file_get_contents($image->getRealPath()));
        $dst = imagecreatetruecolor(300, 300);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, 300, 300, imagesx($src), imagesy($src));
        imagejpeg($dst, $path);
        imagedestroy($src);
        imagedestroy($dst);

        $post->image = $filename;
    }
    $post->save();
    return redirect('/home');
}
public function delete($id){
        Post::destroy($id);
    return redirect('/home');
}
}
