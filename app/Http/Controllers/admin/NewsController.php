<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('community')->paginate(1);
        // return $news;
        return view('admin.news.index', [
            'news' => $news,
            'title' => 'Show All News',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new = new News();
        $communities = Community::get();
        return view('admin.news.create', [
            'title' => 'Create New News',
            'new' => $new,
            'communities' => $communities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->store('/', [
                'disk' => 'upload',
            ]);
            $request->merge([
                'image_url' => $image_path,
            ]);
        }
        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
            $request->merge([
                'images' => $data,
            ]);
        }
        $categories = News::create($request->all());
        return redirect()->route('news.index')->with('create', 'new news is created');
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
        $new = News::findOrFail($id);
        // return $new;
        $communities = Community::get();
        return view('admin.news.edit', [
            'title' => 'Edit The News',
            'new' => $new,
            'communities' => $communities,
        ]);
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
        $new = News::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->store('/', [
                'disk' => 'upload',
            ]);
            $request->merge([
                'image_url' => $image_path,
            ]);
        }
        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
            $request->merge([
                'images' => $data,
            ]);
        }
        $new->update($request->all());
        return redirect()->route('news.index')->with('edit', 'the news is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return redirect()->route('news.index')->with('delete', 'the news is deletes');
    }
}
