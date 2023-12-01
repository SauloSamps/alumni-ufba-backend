<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'where' => 'required',
            'description' => 'required',
        ]);
        $event = new Event;
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->where = $request->input('where');
        $event->description = $request->input('description');
        $event->user_id = auth()->user()->id;
        $event->save();

        return response()->json([
            'message' => 'Evento criado com sucesso'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Event::find($id);
        
        if (Auth::check() && $post->user_id === Auth::id()) {
            $post->delete();
            return redirect('/posts')->with('success', 'Post Removed');
        } else {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post.');
        }
    }
}
