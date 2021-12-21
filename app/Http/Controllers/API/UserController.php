<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('owner.property')->get();
        return [
            'status' => 200,
            'message' => __('users received Successfully'),
            'data' => $users,
        ];
    }

    public function showProfile()
    {
        $profile =Auth::guard('sanctum')->user();
        return [
            'status' => 200,
            'message' => __('the profile of user'),
            'data' => $profile,
        ];
      
    }

    public function editProfile(Request $request)
    {
        $user =Auth::guard('sanctum')->user();
        $request->validate([
            'email' => 'required',
            'country' => 'required',
            'city' => 'required',
            'mobile_number' => 'required',
            'nationality' => 'required',
            'id_number' => 'required',
            'full_name' => 'required'
        ]);
        if ($request->hasFile('image')) {
            if ($user->image_url !== null) {

                unlink(public_path('upload/' . $user->image_url));
            }
            $uploadedFile = $request->file('image');

            $image_url = $uploadedFile->store('/', 'upload');
            $request->merge([
                'image_url' => $image_url
            ]);
        }
        
        $user->update($request->all());
        return  response()->json(
            [
                'status' => '201',
                'message' => __('the profile was updated'),
                'data' => Auth::guard('sanctum')->user()
            ],
            201
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with('owner.property')->where('id', $id)->first();
        return [
            'status' => 200,
            'message' => 'users recived Successfully',
            'data' => $users,
        ];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
