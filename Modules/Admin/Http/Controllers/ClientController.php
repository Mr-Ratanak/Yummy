<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['fetch_data'] = DB::table('clients')->where('active',1)->paginate(config('app.row')); 
        return view('admin::client.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::client.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

      $data = $request->except('_token','profile');

        if($request->profile){
            $data['profile'] = $request->file('profile')->store('uploads/client','customize');
        }
        $insert = DB::table('clients')->insert($data);
        if($insert){
            return redirect()->route('client.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('client.create')->with('error',config('app.error'))->withInput();
        }
    }

  

    public function edit($id)
    {
        $data['client'] = DB::table('clients')->find($id);
        return view('admin::client.edit',$data);
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','profile','_method');
        if($request->profile){
            $data['profile'] = $request->file('profile')->store('uploads/client','customize');
        }
        
     
        $fetch_client = DB::table('clients')->find($id);
        $update = DB::table('clients')->where('id',$id)->update($data);
        if($update){
            if($fetch_client->profile){
                @unlink($fetch_client->profile);
                return redirect()->route('client.index',$id)->with('success',config('app.success'));
            }
        }else{
            return redirect()->route('client.index',$id)->with('error',config('app.error'));
        }

    }

    public function delete($id)
    {
        $fetch_client_inter = DB::table('clients')->find($id);
        $delete = DB::table('clients')->where('id',$id)->delete();
        if($delete){
            if($fetch_client_inter->profile){
                @unlink($fetch_client_inter->profile);
                    return redirect()->route('client.index')->with('success',config('app.delete'));
                
            }
        }else{
            return redirect()->route('client.index')->with('error',config('app.delete_fail'));
        }
    }

}
