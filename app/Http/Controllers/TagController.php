<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::all();
        return view('admin.post.tag.index', [
            'all_data'       => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name'      => 'required'
        ]);

        Tag::create([
            'name'      => $request -> name,
            'slug'      => $this -> getSlug($request -> name)
        ]);

        return redirect() -> route('tag.index') -> with('success', 'Tag Added Successfully!');
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
    public function edit($id)
    {
        $data = Tag::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_id = $request -> edit_id;
        
        $update_data = Tag::find($edit_id);
        $update_data -> name = $request -> name;
        $update_data -> slug = Str::slug($request -> name);
        $update_data -> update();

        return redirect() -> route('tag.index') -> with('success', 'Tag Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Tag::find($id);
        $delete_data -> delete();
        return redirect() -> back() -> with('confirm', 'Tag Deleted Successfully!');

    }


    /**
     * 
     */
    public function tagStatusUpdateInactive($id){

        $status_update = Tag::find($id);
        $status_update -> status = false;
        $status_update -> update();

        return redirect() -> back() -> route('tag.index');

    }



    /**
     * 
     */
    public function tagStatusUpdateActive($id){

        $status_update = Tag::find($id);
        $status_update -> status = true;
        $status_update -> update();

        return redirect() -> back() -> route('tag.index');

    }



}
