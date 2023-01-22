<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryAddRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function showCategories()
    {
       $categories=Category::all()->sortBy('title');
       return view('admin.category.categories')->with('categories', $categories);
    }

    public function newCategory()
    {
        return view('admin.category.category-new');
    }

    public function addCategory(CategoryAddRequest $request)
    {


         $this->validate($request,
            [
                'slug' => 'unique:categories,slug,'
            ],
            [
                'slug.unique' => 'This slug already exists in the database'
            ]
        );


        $category = new Category;

        $category->title=$request->title;
        $category->slug= Str::slug($request->slug);
        $category->subtitle=$request->subtitle;
        $category->excerpt=$request->excerpt;
        $category->views=$request->views;
        // $category->position=$request->position;


        $category->position=$request->position;
        $category->publish=$request->publish;

        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;



        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ','', $request->title) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/categories', $photoName);

            $category->photo = $photoName;
        }

        $category->save();

        return back()->with('success','category added successfully');
    }

    public function editCategory($id)
    {

        if(!Gate::allows('author-rights')){
            return redirect(route('admin.categories'))->with('error', 'you do not have the right to take this action');
        }

        $category = Category::findOrFail($id);
        return view('admin.category.category-edit')->with('category', $category);
        // dd($category);
    }

    public function updateCategory(CategoryAddRequest $request, $id)
    {
        if(!Gate::allows('author-rights')){
            return redirect(route('admin.categories'))->with('error', 'you do not have the right to take this action');
        }

        $this->validate($request,
            [
                'slug' => 'unique:categories,slug,' .$id
            ],
            [
                'slug.unique' => 'This slug already exists in the database'
            ]
        );


        $category=Category::findOrFail($id);

        $category->title=$request->title;
        $category->slug= Str::slug($request->slug);
        $category->subtitle=$request->subtitle;
        $category->excerpt=$request->excerpt;
        $category->views=$request->views;
        // $category->position=$request->position;


        $category->position=$request->position;
        $category->publish=$request->publish;

        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;



        if ($request->hasFile('photo')) {

            // delete old picture from folder images
            if(!($category->photo == 'category.png'))
            {
                File::delete('images/categories/'.$category->photo);
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ','', $request->title) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/categories', $photoName);

            $category->photo = $photoName;
        }

        $category->save();

        return back()->with('success','category updated successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

       if (!($category->photo == 'category.png')) {
        File::delete('images/categories/' . $category->photo);
       }

       $category->delete();

       return back()->with('success','the category <span style="color: red;"> ' . $category->title . ' </span> was successfully deleted');
    }
}
