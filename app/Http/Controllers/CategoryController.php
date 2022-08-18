<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    //add categories to the category table
    public function store(CreateCategoryRequest $request){

        $input = $request->all();
        Category::create($input);
        $categories = Category::all();
        return redirect('home')->with('category',$categories);   
    }


    

}
