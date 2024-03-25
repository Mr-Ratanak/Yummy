<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
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
        $event = DB::table('slide_event')->where('active',1)->paginate(config('app.row'));
        return view('admin::event.index',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::event.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required|min:5',
            'sequence'=>'required'
        ]);

        $data = $request->except('_token','photo');

        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/event','customize');
        }
        $insert = DB::table('slide_event')->insert($data);
        if($insert){
            return redirect()->route('event.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('event.create')->with('error',config('app.error'))->withInput();
        }

    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['event'] = DB::table('slide_event')->find($id);
        return view('admin::event.edit',$data);
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
            'title'=>'required|min:1',
            'price'=>'required',
            'detail'=>'required',
            'sequence'=>'required'
        ]);
        $data = $request->except('_token','photo','_method');
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/event','customize');
        }
        
        // $data = array(
        //     'title'=>$request->title,
        //     'price'=>$request->price,
        //     'detail'=>$request->detail,
        //     'sequence'=>$request->sequence
        // );
      
        $fetch_event = DB::table('slide_event')->find($id);
        $update = DB::table('slide_event')->where('id',$id)->update($data);
        if($update){
            if($fetch_event->photo){
                @unlink($fetch_event->photo);
                return redirect()->route('event.index',$id)->with('success',config('app.success'));
            }
        }else{
            return redirect()->route('event.edit',$id)->with('error',config('app.error'));
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $delete = DB::table('slide_event')->where('id',$id)->update(['active'=>0]);
        if($delete){
            return redirect()->route('event.index')->with('success',config('app.delete'));
        }else{
            return redirect()->route('event.index')->with('error',config('app.delete_fail'));
        }
    }
}
