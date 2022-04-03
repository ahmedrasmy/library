<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::select(
            'id', 
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            )->orderBy('id','DESC')->paginate(3);

        return view('categories/index',compact('categories'));
    }
    public function show($id){
        Category::findOrFail($id);
        $category =Category::select(
            'id', 
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            )->where('id',$id)->first();

        return view('categories/show',compact('category'));
    }
    public function create(){
        return view('categories/create');
    }
    public function store(CategoryRequest $request){
        Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
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
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);
        return redirect(route('categories.index'));
    }
    public function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('categories.index'));
    }
}
