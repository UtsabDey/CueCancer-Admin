<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }
    public function registration()
    {
        return view('admin.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email|max:50',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
        ]);
        if($validator->fails()){   return back()->withErrors($validator)->withInput(); }
       

        $user = User::where('email', $request->email)->first();
        if ($user != null && Hash::check($request->password, $user->password)) {
            $request->session()->put('loggedUser', $user);
        
            return redirect('/')->with('success', 'Log In Successfully');
        }
        else{
            return back()->with('warning', 'Wrong Email/Password!');
        }
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'user_id' => 'unique:users,user_id|required|max:10',
            'email' => 'required|unique:users,email|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
            'blood_grp' => 'required|max:10',
            'address' => 'required',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|same:cpassword|max:100',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $insert = new User();
        $insert->name = $request->name;
        $insert->user_id = $request->user_id;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->image = $request->image;
        $insert->blood_grp = $request->blood_grp;
        $insert->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            // // unlink photo
            // if(file_exists(public_path('/picture/common/') .$update->photo)){
            //     unlink(public_path('/picture/common/') .$update->photo);
            // };
            $photo = $request->image;
            $photo_name = time().rand(111,999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('/photos/').$photo_name);
            $insert->image = $photo_name;
          
        }
        $insert->save();
        return redirect('/')->with('success', 'Registered successfully!');
    
    }

    public function show()
    {

    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login')->with('success', 'Log Out Successfully',);
    }
}
