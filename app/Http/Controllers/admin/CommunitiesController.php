<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    public function index()
    {
        $communities = Community::get();
        return view('admin.communities.index', [
            'communities' => $communities,
            'title' => 'Show All Communities'
        ]);
    }
    public function create()
    {
        $community = new Community();
        return view('admin.communities.create', [
            'community' => $community,
            'title' => 'Create New Community'
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $image_path = $file->store('/', [
                'disk' => 'upload',
            ]);
            $request->merge([
                'image' => $image_path,
            ]);
        }
        $community = Community::create($request->all());
        return redirect(route('communities.index'));
    }

    public function show($id)
    {
        $response = Http::get('http://www.geoplugin.net/extras/forward_place.gp?place=Sohag&country=EG');
        return unserialize($response)[0];
    }
    public function edit($id)
    {
        $community = Community::findOrFail($id);
        return view('admin.communities.edit', [
            'community' => $community,
            'title' => 'Edit The Community'
        ]);
    }
    public function update(Request $request, $id)
    {
        $community = Community::findOrFail($id);
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $image_path = $file->store('/', [
                'disk' => 'upload',
            ]);
            $request->merge([
                'image' => $image_path,
            ]);
        }
        $community->update($request->all());
        return redirect(route('communities.index'));
    }
    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        $community->delete();
        return redirect(route('communities.index'));
    }
}
