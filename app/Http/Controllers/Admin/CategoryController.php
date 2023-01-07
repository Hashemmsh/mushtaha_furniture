<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::with('parent')->orderByDesc('id')->paginate(10);
       // dd($categories);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::with('parent')->select('id','name')->get();

        return view('admin.categories.create' , compact('categories'));
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
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);
        $img_name =null;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'),$img_name);
        }

        $name = json_encode( [
            'en' => $request->name_en ,
            'ar' => $request->name_ar],
            JSON_UNESCAPED_UNICODE);

        Category::create([
            'name' => $name,
            'image' => $img_name,
            'parent_id' =>$request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('msg' ,'category create successfully' )->with('type' , 'success');


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
    public function edit(Category $category)
    {
        $categories = Category::select('id' , 'name')->where ('id', '!=',$category->id)->get();
        return view('admin.categories.edit' , compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);
        //update image old
        $img_name = $category->image ;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'),$img_name);
        }

        $name = json_encode( [
            'en' => $request->name_en ,
            'ar' => $request->name_ar],
            JSON_UNESCAPED_UNICODE);

        $category->update([
            'name' => $name,
            'image' => $img_name,
            'parent_id' =>$request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('msg' ,'category update successfully' )->with('type' , 'success');

    }


    public function destroy($id)
    {

        $category = Category::find($id);
        File::delete(public_path('uploads/categories'.$category->image));
        Category::where('parent_id' , $id)->update(['parent_id' => null]);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg','Category deleted successfully')->with('type','danger');
    }

    public function trash()
    {
        //onlytashed (فقط بتجيب الاشياء المحذوفة)
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trash' , compact('categories'));
    }

    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.categories.index')->with('msg', 'Category restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        File::delete(public_path('uploads/categories/'. $category->image));
        $category->forcedelete();

        return redirect()->route('admin.categories.trash')->with('msg', 'Category deleted permanintly successfully')->with('type', 'danger');

    }
}
