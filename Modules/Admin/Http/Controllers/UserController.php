<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        // $data['users'] = DB::table('users')->paginate(config('app.row'));
        $data['users'] = User::paginate(5);

        return view('admin::users.index', $data);
    }


    public function create()
    {
        return view('admin::users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|unique:users',
            'password' => 'required|min:3'
        ]);
        $data = $request->except('_token', 'password', 'images');
        $data['password'] = bcrypt($request->password);
        if ($request->images) {
            $data['images'] = $request->file('images')->store('uploads/users', 'customize');
        }
        $insert = DB::table('users')->insert($data);

        if ($insert) {
            return redirect()->route('user.create')->with('success', config('app.success'));
        }
        return redirect()->route('user.create')->with('error', config('app.error'))->withInput();
    }


    public function edit($id)
    {
        $data['fetch'] = DB::table('users')->find($id);
        return view('admin::users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
        );

        if ($request->images) {
            $data['images'] = $request->file('images')->store('uploads/users', 'customize');
        }
        $i = DB::table('users')->where('id', $id)->update($data);
        if ($i) {
            return redirect()->route('user.edit', $id)->with('success', config('app.success'));
        } else {
            return redirect()->route('user.edit', $id)->with('error', config('app.error'));
        }
    }

    public function delete($id)
    {
        $data = DB::table('users')->find($id);
        $i = DB::table('users')->where('id', $id)->delete();
        if ($i) {
            if ($data->images) {
                unlink($data->images);
            }
            return redirect()->route('user.index')->with('success', 'Data has been removed!');
        } else {
            return redirect()->route('user.index')->with('error', 'Delete Failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        // return view('login');
        return redirect('admin');
    }


    public function reset_password()
    {
        return view('admin::users.reset');
    }

    public function save(Request $request)
    {
        $pass = $request->password;
        $cpass = $request->cpassword;

        if ($pass != $cpass) {
            return redirect()->route('user.reset_password')->with('error', 'Password not match Or Invalid password !!!');
        }
        $pass = bcrypt($pass);
        $update_password = DB::table('users')->where('id', Auth::user()->id)
            ->update(['password' => $pass]);

        if ($update_password) {
            return redirect()->route('user.reset_password')->with('success', 'New password has been save');
        } else {
            return redirect()->route('user.reset_password')->with('error', 'Invalid password !!!');
        }
    }
}
