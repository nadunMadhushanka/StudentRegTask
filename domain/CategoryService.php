<?php

namespace domain;

use App\Models\Category;


class CategoryService
{
    
// create a new category
    public function createCategory($input){
        Category::create($input);
    }

//get all categories
    public function getCategories(){
        $categories = Category::all();
        return $categories;
    }

//add categories to the category table
    public function store($input){
        $this->createCategory($input);
        $categories = $this->getCategories();
        return $categories;       
    }
}