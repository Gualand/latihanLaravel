<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('page.post.index', ['post' => $post]);
    }


    public function create()
    {
        $categories = Category::get();
        return view ('page.post.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'postName' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
        ],
        [
            'postName.required' => 'Nama postingan tidak boleh kosong!',
            'content.required' => 'Isi konten harus diisi!',
            'category_id.required' => 'Kategory tidak boleh kosong!',
            'thumbnail.required' => 'Gambar kategori harus diisi!',
        ]);


        $thumbnailName = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $thumbnailName);

        Post::create([
            'postName' => $request->input('postName'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'thumbnail' => $thumbnailName,
        ]);
 
        return redirect('/post');
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        return view('page.post.detail', ['post' => $post]);
    }


    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::get();

        return view('page.post.edit', ['post' => $post, 'categories' => $categories]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'postName' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg',
        ],
        [
            'postName.required' => 'Nama postingan tidak boleh kosong!',
            'content.required' => 'Isi konten harus diisi!',
            'category_id.required' => 'Kategory tidak boleh kosong!',
        ]);

        $post = Post::find($id);

        if ($request->has('thumbnail')) {
            File::delete(public_path('images/' . $post->thumbnail));

            $thumbnailName = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $thumbnailName);

            $post->thumbnail = $thumbnailName;

        }

        $post->update([
            'postName' => $request->input('postName'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect('/post');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        File::delete(public_path('images/' . $post->thumbnail));

        return redirect('/post');
    }
}
