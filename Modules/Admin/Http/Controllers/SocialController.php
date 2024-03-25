<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
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
        $data['social'] = DB::table('socials')->where('active',1)->paginate(config('app.row'));
        return view('admin::social.index',$data);

    }

 
    public function create()
    {
        return view('admin::social.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'icon'=>'required',
            'url'=>'required'
        ]);
        $data = $request->except('_token');
        $insert = DB::table('socials')->insert($data);
        if($insert){
            return redirect()->route('social.index')->with('success',config('app.success'));
         }else{
            return redirect()->route('social.edit')->with('error',config('app.error'));
         }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['soc'] = DB::table('socials')->find($id);
        return view('admin::social.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'icon'=>'required',
            'url'=>'required'
        ]);
        $data = $request->except('_token','_method');

       $data = array(
        'name'=>$request->name,
        'icon'=>$request->icon,
        'url'=>$request->url
       );
       $edit = DB::table('socials')->where('id',$id)->update($data);
       if($edit){
            return redirect()->route('social.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('social.edit')->with('error',config('app.error'));
     }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $delete = DB::table('socials')->where('id',$id)->update(['active'=>0]);
        if($delete){
            return redirect()->route('social.index')->with('success',config('app.delete'));
        }else{
            return redirect()->route('social.index')->with('error',config('app.delete_fail'));
        }
    }
}
