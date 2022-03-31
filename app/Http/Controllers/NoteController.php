<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function create(){
        return view('notes/create');
    }

    public function store(NoteRequest $request){
       
        Note::create(
            [
                'content_en' => $request->content_en,
                'content_ar' => $request->content_ar,
                'user_id' => Auth::user()->id,
            ]
        ) ; 
        
        return redirect( route('books.index') );
    }
}
