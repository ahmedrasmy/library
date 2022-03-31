<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Traits\BookTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BookController extends Controller
{
    use BookTrait;
    
    public function home()
    {
        return view('index');
    }
    public function index(){
        $books=Book::select(
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'desc_' . LaravelLocalization::getCurrentLocale() . ' as desc',
            'img',
        )->orderBy('id','DESC')->get();

        return view('books/index',compact('books'));
    }
    public function search(Request $request){
        $keyword=$request -> keyword;
        $books=Book::select(
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'desc_' . LaravelLocalization::getCurrentLocale() . ' as desc',
            'img',
        )->where('title_'. LaravelLocalization::getCurrentLocale(),
        'like',"$keyword%")
        ->get();
        return response()->json($books);
    }
    public function show($id){
        Book::findOrFail($id);
        $book =Book::select(
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'desc_' . LaravelLocalization::getCurrentLocale() . ' as desc',
            'img',
        )-> where('id',$id)->first();
        return view('books/show',compact('book'));
    }
    public function create(){
        $categories=Category::select(
        'id', 
        'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
        )
        ->get();
        return view('books/create' , compact('categories'));
    }
    public function store(StoreBookRequest $request){

        // Move Img to folder uplpads books 
        $name = $this->saveImage ($request->file('img') ,'uploads/books');

        // add to DB
        $book=Book::create(
        [
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'desc_en'  => $request->desc_en,
            'desc_ar'  => $request->desc_ar,
            'img'   =>$name
        ]);
        $book->categories()->sync($request->categories_ids);
        
        return redirect(route('books.index'));
    }
    public function edit($id){
        $book =Book::findOrFail($id);
        $categories=Category::select(
            'id', 
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            )->get();
        return view('books/edit',compact('book','categories'));
    }
    public function update(StoreBookRequest $request,$id){
        
        $book=Book::findOrFail($id);
        $name=$book->img;
        // Move Img to folder uplpads books 
        if($request->hasFile('img')){
            if($name !== null){
                unlink(public_path('uploads/books/').$name);
            }
            $name = $this->saveImage ($request->file('img') ,'uploads/books');

        }
        
        $book->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'desc_en'  => $request->desc_en,
            'desc_ar'  => $request->desc_ar,
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
        return redirect(route('books.index'))->with('success',__('site.Deleted Successfully'));
    }

    
    
}




// $books=Book::select('title','desc')->get();
// $books =Book::where('id','>=',2)->get();
// $books =Book::select('title','desc')->where('id','>=',2)->orderBy('id','DESC')->get();