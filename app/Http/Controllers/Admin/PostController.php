<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(10);
        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::select('id', 'title')->get();
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        //validate
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'nullable',

        ]);

        //Upload File
         $img_name = null;
         if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/posts'), $img_name);
         }

         $title = json_encode([
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ],JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ],JSON_UNESCAPED_UNICODE);

        $data = $request->except('_token');
        unset($data['title_en']);
        unset($data['title_ar']);
        unset($data['description_en']);
        unset($data['description_ar']);
        $data['title'] = $title;
        $data['description'] = $description;
        $data['image'] = $img_name;
        $data['user_id']=Auth::id();
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('msg' , 'Posts created successfully')->with('type' , 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $posts = Post::select('id' , 'title')->get();
        return view('admin.posts.edit' , compact('post','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
          //validate
          $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'nullable',

        ]);

        //Upload File
         $img_name = null;
         if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/posts'), $img_name);
         }

         $title = json_encode([
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ],JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ],JSON_UNESCAPED_UNICODE);

        $data = $request->except('_token');
        unset($data['title_en']);
        unset($data['title_ar']);
        unset($data['description_en']);
        unset($data['description_ar']);
        $data['title'] = $title;
        $data['description'] = $description;
        $data['image'] = $img_name;
       // $data['user_id']=Auth::id();
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('msg' , 'Posts Update successfully')->with('type' , 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index')->with('msg' , 'Post deleted successfully')->with('type','danger');
    }

    /**
     * Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash' , compact('posts'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.posts.index')->with('msg', 'posts restored successfully')->with('type', 'warning');
    }

    /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $post = Post::onlyTrashed()->find($id);
        File::delete(public_path('uploads/products/'. $post->image));
        $post->forcedelete();
        return redirect()->route('admin.posts.trash')->with('msg', 'Post deleted permanintly successfully')->with('type', 'danger');
    }
}
