<?php

// PostController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'done' => $request->get('done'),
            'title_task_1' => $request->get('title_task_1'),
            'title_task_2' => $request->get('title_task_2'),
            'title_task_3' => $request->get('title_task_3'),
            'task_1' => $request->get('task_1'),
            'task_2' => $request->get('task_2'),
            'task_3' => $request->get('task_3'),
            'task_1_done' => $request->get('task_1_done'),
            'task_2_done' => $request->get('task_2_done'),
            'task_3_done' => $request->get('task_3_done')

        ]);

        $post->save();

        return response()->json('successfully added');
    }

    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json('successfully deleted');
    }
}
