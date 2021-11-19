<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WooCommerceApi;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Support\Collection;

class TicketsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

    public function tickets() {
        $myArray = [
                ['id'=>1, 'title'=>'Laravel CRUD'],
                ['id'=>2, 'title'=>'Laravel Ajax CRUD'],
                ['id'=>3, 'title'=>'Laravel CORS Middleware'],
                ['id'=>4, 'title'=>'Laravel Autocomplete'],
                ['id'=>5, 'title'=>'Laravel Image Upload'],
                ['id'=>6, 'title'=>'Laravel Ajax Request'],
                ['id'=>7, 'title'=>'Laravel Multiple Image Upload'],
                ['id'=>8, 'title'=>'Laravel Ckeditor'],
                ['id'=>9, 'title'=>'Laravel Rest API'],
                ['id'=>10, 'title'=>'Laravel Pagination'],
        ];
      
        $per_page = 5;
        $data = (new Collection($myArray))->paginate($per_page);
        return view('tickets', compact('data'));
    }

}