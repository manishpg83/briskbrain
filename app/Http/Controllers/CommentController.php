<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Mail\CommentAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body' => 'required',
            'name' => 'nullable',
            'email' => 'nullable|email',
        ]);

        if (auth()->check()) {
            $input['user_id'] = auth()->user()->id;
        } else {
            $input['user_id'] = null;
        }

        // Save the comment
        $comment = Comment::create($input);

        // Send email to admin
        $adminEmail = 'manish.bhuvait@gmail.com'; // Replace with the actual admin email
        Mail::to($adminEmail)->send(new CommentAdded($comment));

        return back()->with('message', 'Your comment has been added!');
    }
}



