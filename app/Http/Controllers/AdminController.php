<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Http\Models\Blog;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        $data['patient'] = Patient::get();
        $data['doctor'] = Doctor::get();
        $data['appointment'] = Appointment::get();
        return view('admin.dashboard',$data);
    }

    public function profile()
    {
        $data['user'] = User::find(Session('loggedUser')->id);
        return view('admin.profile', $data);
    }

    public function appointment()
    {
        $data['patient'] = Patient::get();
        $data['appointment'] = Appointment::get();
        $data['doctor'] = Doctor::get();
        return view('admin.appointment-list',$data);
    }

    public function accept($id)
    {
        $update = Appointment::find($id);
        $update->status = 'approved';
        $update->save();
        return back()->with('success', 'Status updated successfully!');
    }

    public function patientlist()
    {
        $data['patients'] = Patient::paginate(5);
        return view('admin.patient-list', $data);
    }

    public function patient()
    {
        return view('admin.addpatient');
    }

    public function addpatient(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'patient_id' => 'unique:patients,patient_id|required|max:10',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
            'blood_grp' => 'required|max:10',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;
    
        $insert = new Patient();
        $insert->name = $request->name;
        $insert->dob = $request->dob;
        $insert->age = $age;
        $insert->address = $request->address;
        $insert->patient_id = $request->patient_id;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->image = $request->image;
        $insert->blood_grp = $request->blood_grp;
        $insert->total_visit = 0;
        $insert->password = Hash::make($request->password);
    
        if ($request->hasFile('image')) {
            $photo = $request->image;
            $photo_name = time().rand(111, 999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/photos/').$photo_name);
            $insert->image = $photo_name;
        }
        $insert->save();
        return back()->with('success', 'Registered successfully!');
    }

    public function doctorlist()
    {
        $data['doctors'] = Doctor::paginate(5);
        return view('admin.doctor-list',$data);
    }    

    public function doctor()
    {
        return view('admin.adddoctor');
    }

    public function deldoctor($id)
    {
        Doctor::find($id)->delete();
        return back()->with('warning', 'Data deleted successfully!');
    }

    public function adddoctor(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'doctor_id' => 'unique:doctors,doctor_id|required|max:10',
            'address' => 'required',
            'speciality' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'blood_grp' => 'required|max:10',
            'from' => 'required',
            'to' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $insert = new Doctor();
        $insert->name = $request->name;
        $insert->dob = $request->dob;
        $insert->age = $age;
        $insert->speciality = $request->speciality;
        $insert->address = $request->address;
        $insert->doctor_id = $request->doctor_id;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->image = $request->image;
        $insert->blood_grp = $request->blood_grp;
        $insert->fee = $request->fee;
        $insert->day = $request->from.','.$request->to;
        $insert->time = $request->time_from.','.$request->time_to;
        $insert->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $photo = $request->image;
            $photo_name = time().rand(111,999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('/photos/').$photo_name);
            $insert->image = $photo_name;
        }
        $insert->save();
        return back()->with('success', 'Doctor Registered successfully!');
    }


    public function changePass(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'oldpassword' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|same:cpassword|max:100',
        ]);
        if($validate->fails()){   return back()->withErrors($validate)->withInput(); }

        $user = User::find($request->id);
        if(Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
        }
        return back()->with('error', 'Password is not changed!');
    }


    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'blood_grp' => 'required|max:10',
            'address' => 'required',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $update = User::find($request->id);
        $update->name = $request->name;
        $update->address = $request->address;
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->blood_grp = $request->blood_grp;
        if ($request->hasFile('image')) {
            // unlink photo
            if(file_exists(public_path('/photos/') .$update->image)){
                unlink(public_path('/photos/') .$update->image);
            };
            $photo = $request->image;
            $photo_name = time().rand(111,999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('/photos/') .$photo_name);
            $update->image = $photo_name;
        }
        if($update->isDirty()) {
            $update->save();
            return back()->with('success', 'Profile updated successfully!');
        }
        return back()->with('warning', 'Nothing changed!');
    }


    public function destroy($id)
    {
        // Member::find($id)->delete();
        // return back()->with('success','Data deleted successfully!');
    }
}
