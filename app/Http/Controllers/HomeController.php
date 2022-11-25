<?php

namespace App\Http\Controllers;

use App\Models\GroupedProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $groupModel = new GroupedProduct();
        $groups = $groupModel->orderBy('position')->get();

        return view('welcome', [
            'groups' => $groups
        ]);
    }
}
