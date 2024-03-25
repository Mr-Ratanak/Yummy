<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $about_us = DB::table('about_us')->where('active',1)->paginate(config('app.row'));
        return view('admin::about_us.index', compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       $request->validate([
        'photo'=>'required',
        'title'=>'required|min:1',
        'phone'=>'required|max:12',
        'background'=>'required',
        'url'=>'required'
       ]);
       
       $data = array(
        'title'=>$request->title,
        'phone'=>$request->phone,
        'description_1'=>$request->description_1,
        'description_2'=>$request->description_2,
        'check_text_1'=>$request->check_text_1,
        'check_text_2'=>$request->check_text_2,
        'check_text_3'=>$request->check_text_3,
        'url'=>$request->url
       );
       if($request->photo){
        $data['photo'] = $request->file('photo')->store('uploads/about_us','customize');
       }
       if($request->background){
        $data['background'] = $request->file('background')->store('uploads/about_us','customize');
       }
       $insert = DB::table('about_us')->insert($data,$request->except('_token'));
       if($insert){
        return redirect()->route('about_us.index')->with('success',config('app.success'));
       }else{
        return redirect()->route('about_us.create')->with('error',config('app.error'));
       }


    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['about'] = DB::table('about_us')->find($id);
        return view('admin::about_us.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'title'=>$request->title,
            'phone'=>$request->phone,
            'description_1'=>$request->description_1,
            'description_2'=>$request->description_2,
            'check_text_1'=>$request->check_text_1,
            'check_text_2'=>$request->check_text_2,
            'check_text_3'=>$request->check_text_3,
            'url'=>$request->url
        );
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/about_us','customize');
        }
        if($request->background){
            $data['background'] = $request->file('background')->store('uploads/about_us','customize');
        }
        $update = DB::table('about_us')->where('id',$id)->update($data);
        if($update){
            return redirect()->route('about_us.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('about_us.edit')->with('error',config('app.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $data = DB::table('about_us')->find($id);
        if($data->photo){
            @unlink($data->photo);
        }
        if($data->background){
            @unlink($data->background);
        }
        $delete = DB::table('about_us')->where('id',$id)->delete();
     
        if($delete){
            return redirect()->route('about_us.index')->with('success',config('app.delete'));
        }else{
            return redirect()->route('about_us.index')->with('success',config('app.delete_fail'));
        }
    }
}
