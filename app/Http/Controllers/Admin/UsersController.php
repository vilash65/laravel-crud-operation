<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\image;
use Session;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::join('image','users.image','image.id')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|max:191',
            'lname'           => 'required|max:191',
            'email'          => 'required|max:191|email|unique:users',
            'phone'           => 'required|max:10',
            'address'           => 'required|max:300',
            'password'       => 'required|max:191|confirmed|min:6',
        ]);

        $nimage = null;
        $image = $request->file('image');   // img =  input nu name apyu e
        if($image!=null)
        {
          $nimage = $image->getClientOriginalName();   //  navo variable
          $image->move("img",$nimage);                // file ma move karva mate
        }

        $cimage = new image();           // model name
        $cimage->img_name=$nimage;
        $cimage->save();

        $user = new User;

        $user->name      = $request->name;
        $user->lname      = $request->lname;
        $user->email     = $request->email;
        $user->phone      = $request->phone;
        $user->address      = $request->address;
        $user->image      = $cimage->id;
        $user->password  = $request->password;

        if($user->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'User Successfully Added.',
                'type'  => 'success',
            ];
            
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Occurred While Adding a User.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'           => 'required|max:191',
            'lname'           => 'required|max:191',
            'email'          => 'required|max:191|email|unique:users,email,' . $id,
            'phone'           => 'required|max:10',
            'address'           => 'required|max:300',
            'password'       => 'required|max:191|confirmed|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->name      = $request->name;
        $user->email     = $request->email;

        if(!empty($request->password))
        {
            $user->password  = bcrypt($request->password);
        }

        if($user->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'User Successfully Updated.',
                'type'  => 'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The User.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.users.index');
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user->delete())
        {
            $alert_toast = 
            [
                'title' =>  'Operation Successful : ',
                'text'  =>  'User Successfully Deleted.',
                'type'  =>  'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Deleting The User.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.users.index');
    }

 
}
