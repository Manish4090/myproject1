<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index(){
		$data = Categories::get();
		return view('admin.categories.index',compact('data'));
	}
	public function showcategories($id){
		$data = Categories::find($id);
		return view('admin.categories.show',compact('data'));
	}
	public function editcategories($id){
		$data = Categories::find($id);
		return view('admin.categories.edit',compact('data'));
	}
	public function updatecategories(Request $request,$id){
		$data = $request->all();
		$catData = array(
			'cat_name' => $data['cat_name'],
			'additional_des' => $data['additional_des'],
		);
		Categories::where('id', $id)->update($catData);
		return redirect('/admin/categories')->with('message', 'Categories Updated Successfully!!');
		
	}
	public function addcategories(Request $request){
		$parrentCat = Categories::select('cat_name','id')->get();
		//dd($parrentCat);
		return view('admin.categories.addnewcategories',compact('parrentCat'));
	}
	public function storecategories(Request $request){
		$data = $request->all();
		
		$validatedData = $request->validate([
			'cat_name' => 'required',
			'cat_image' => 'required',
		]);
		
		if ($request->hasFile('cat_image')) {
			$filenameWithExt = $request->file('cat_image')->getClientOriginalName ();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('cat_image')->getClientOriginalExtension();
			//dd($extension);
			$fileNameToStore = $filename. '_'. time().'.'.$extension;
			$path = $request->file('cat_image')->storeAs('public/cat_image', $fileNameToStore);
		}
		
		$storeCatData = array(
			'cat_name' => $data['cat_name'],
			'additional_des' => $data['additional_des'],
			'image' => $fileNameToStore,
			'status' => $data['status'],
			'parent_id' => $data['parentid'],
		);
		
		Categories::create($storeCatData);
		
		return redirect('/admin/categories')->with('message', 'Categories Created Successfully!!');
		
		
	}
}
