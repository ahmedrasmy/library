<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class BookController extends Controller
{
    //
    public function home()
    {
        return view('index');
    }
    public function index(){
        $books=Book::orderBy('id','DESC')->get();

        return view('books/index',compact('books'));
    }
    public function search(Request $request){
        $keyword=$request -> keyword;
        $books=Book::where('title','like',"%$keyword%")->get();
        return response()->json($books);
    }
    public function show($id){
        $book =Book::findOrFail($id);

        return view('books/show',compact('book'));
    }
    public function create(){
        $categories=Category::select('id', 'name')->get();
        return view('books/create' , compact('categories'));
    }
    public function store(Request $request){
        // Validation 
        $request->validate(
            [
                'title'=>'required|string|max:100',
                'desc'=>'required|string',
                'img' =>'required|image|mimes:jpg,bmp,png',
                'categories_ids' => 'required',
                'categories_ids.*' => 'exists:categories,id',
            ]
            );
        
        // Move Img to folder uplpads books 
        $img=$request->file('img');
        $ext=$img->getClientOriginalExtension();
        $name="book- ". uniqid() .".$ext";
        $img->move(public_path('uploads/books'),$name);
        // add to DB
        $book=Book::create(
        [
            'title' => $request->title,
            'desc'  => $request->desc,
            'img'   =>$name
        ]);
        $book->categories()->sync($request->categories_ids);

        return redirect(route('books.index'));
    }
    public function edit($id){
        $book =Book::findOrFail($id);
        $categories=Category::select('id', 'name')->get();
        return view('books/edit',compact('book','categories'));
    }
    public function update(Request $request,$id){
        // Validation 
        $request->validate(
            [
                'title'=>'required|string|max:100',
                'desc'=>'required|string',
                'img' =>'nullable|image|mimes:jpg,bmp,png',
                'categories_ids' => 'required',
                'categories_ids.*' => 'exists:categories,id',
            ]
            );
        $book=Book::findOrFail($id);
        $name=$book->img;
        // Move Img to folder uplpads books 
        if($request->hasFile('img')){
            if($name !== null){
                unlink(public_path('uploads/books/').$name);
            }
            $img=$request->file('img');
            $ext=$img->getClientOriginalExtension();
            $name="book- ". uniqid() .".$ext";
            $img->move(public_path('uploads/books'),$name);
        }
        
        $book->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'img'=>$name
        ]);
        $book->categories()->sync($request->categories_ids);
        return redirect(route('books.index'));
    }
    public function delete($id){
        $book=Book::findOrFail($id);
        if($book->img!==null)
        {
            unlink(public_path('uploads/books/').$book->img);
        }
        $book->delete();
        return redirect(route('books.index'));
    }
    
}




// $books=Book::select('title','desc')->get();
// $books =Book::where('id','>=',2)->get();
// $books =Book::select('title','desc')->where('id','>=',2)->orderBy('id','DESC')->get();