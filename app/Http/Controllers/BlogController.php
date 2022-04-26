<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['blogs'] = Blog::paginate(2);
        return view('blog.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title|max:100',
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
            'details' => 'required',
            'author_id' => 'required',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }

        $insert = new Blog();
        $insert->title = $request->title;
        $insert->author_id = $request->author_id;
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
            })->save(public_path('/photos/') .$photo_name);
            $insert->image = $photo_name;
          
        }
        $insert->details = $request->details;
        $insert->save();
        return back()->with('success', 'Post submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $blogs =  Blog::paginate(8);
        // return view('blog.list', ['lists' => $blogs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit'] = Blog::where('id', $id)->first();
        return view('blog.edit', $data);
    }
    
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|max:100|unique:blogs,title,'.$request->id.',id',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:1024',
            'details' => 'required',
        ]);
        if($validate->fails()){
            foreach ($validate->messages()->getMessages() as $field_name => $messages) {
                return back()->with('error', $messages[0]); }
        }

        $update = Blog::find($request->id);
        $update->title = $request->title;
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
        
        $update->details = $request->details;
        if($update->isDirty()) {
            $update->save();
            return redirect('/blog/list')->with('success', 'Post updated successfully!');
        }
        return back()->with('warning', 'Nothing changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return back()->with('warning', 'Data deleted successfully!');
    }
}
