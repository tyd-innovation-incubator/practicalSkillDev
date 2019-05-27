<?php

namespace App\Http\Controllers;



use App\Models\Sysdef\CodeValue;
use App\Models\Systdef\Country;
use App\Models\Systdef\Region;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code_value = CodeValue::class;
        $query = $code_value->query()->select(['id'])->where("code_id", 1)->whereIn("id", [2, 3, 4])->get();
dd($query);
//        $posts = post::where('status',1)->paginate(3);
        $countries = Country::pluck('name','id');
        $regions = Region::pluck('name','id');
    return view('home')
        ->with('regions',$regions)
        ->with('countries',$countries);
    }

}
