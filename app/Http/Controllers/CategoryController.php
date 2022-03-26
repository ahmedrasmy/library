<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::orderBy('id','DESC')->get();

        return view('categories/index',compact('categories'));
    }
    public function show($id){
        $category =Category::findOrFail($id);

        return view('categories/show',compact('category'));
    }
    public function create(){
        return view('categories/create');
    }
    public function store(CategoryRequest $request){
        Category::create([
            'name' => $request->name,
        ]);
        return redirect(route('categories.index'));
    }
    public function edit($id){
        $category =Category::findOrFail($id);
        return view('categories/edit',compact('category'));
    }
    public function update(CategoryRequest $request,$id){
        
        $category=Category::findOrFail($id);
        $category->update([
            'name'=>$request->name,
        ]);
        return redirect(route('categories.index'));
    }
    public function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('categories.index'));
    }
}
