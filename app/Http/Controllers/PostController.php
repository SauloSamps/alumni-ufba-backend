<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreatePostRequest $request)
    {
        $data = $request->validated();

        $post = new Post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return response()->json([
            'message' => 'Tópico cadastrado com sucesso'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input['title'];
        $post->content = $request->input['content'];
        $post->category_id = $request->input['category_id'];
        $post->save();

        return response()->json([
            'message' => 'Tópico atualizado com sucesso'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (Auth::check() && $post->user_id === Auth::id()) {
            $post->delete();
            return response()->json([
                'message' => 'Tópico removido com sucesso'
            ]);
        } else {
            return response()->json([
                'message' => 'Você não tem permissão para alterar este tópico'
            ]);
        }
        
    }
}
