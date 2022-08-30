<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use domain\Facades\CategoryFacade;

class CategoryController extends Controller
{
    //add categories to the category table
    public function store(CreateCategoryRequest $request){
        
        $input = $request->all();
        $categories = CategoryFacade::store($input);
        return redirect('home')->with('category',$categories);
    }


    

}
