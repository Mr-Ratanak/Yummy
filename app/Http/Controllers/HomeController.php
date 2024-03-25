<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['fetch_gallery'] = DB::table('gallery')->where('active',1)->orderBy('sequence')->get();
        $data['feature'] = DB::table('features')->where('active',1)->get();
        $data['event'] = DB::table('slide_event')->where('active',1)->orderBy('sequence')->get();
        $data['chef'] = DB::table('chefs')->where('active',1)->get();
        $data['client'] = DB::table('clients')->where('active',1)->orderBy('sequence')->get();

        $data['category'] = DB::table('category')->where('active',1)->get();
        $data['menu'] = DB::table('menu')
        ->join('category','menu.category_id','category.id')
        ->where('menu.active',1)->select('menu.*','category.*')->get();

        $data['about_us'] = DB::table('about_us')->where('active',1)->get();
        
        
        return view('index',$data);
    }

    
    public function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'time'=>'required',
            'people'=>'required',
            'message'=>'required'           
        ]);
        $data = $request->except('_token');
        $insert = DB::table('book_a_table')->insert($data);
        if($insert){
            return redirect('index')->with('success',config('app.success'));
        }else{
            return redirect('index')->with('error',config('app.error'));
        }


    }

}
