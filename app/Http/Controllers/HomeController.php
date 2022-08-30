<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Student;
use App\Models\Course;
use domain\Facades\CategoryFacade;
use domain\Facades\CaurseFacade;
use infrastructure\Facades\BinanceFacade;




use domain\Facades\HomeFacade;
use domain\Facades\StudentFacade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    // this function will start the home page
    public function index()
    {
        $category = CategoryFacade::getCategories();
        $students = StudentFacade::getStudent();
        $courses = CaurseFacade::getCaurse();
        $balance = BinanceFacade::getWalletBallence();
        return view('home')->with('category',$category)->with('student',$students)->with('course',$courses)->with('balance',$balance);
        
    }
}
