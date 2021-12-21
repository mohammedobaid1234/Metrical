<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /* binging users */
    public function index()
    {
        $users = User::where('status', '0')->where('type', '<>' , '0')->get();

        return view('admin.users.index', [
            'users' => $users,
            'title' => 'Pending Users'
        ]);
    }

    public function showBindingUser($id)
    {
        $user = User::with('tenant', 'owner')->where('id', $id)->first();
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function acceptBinding(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '1']);
        return redirect()->route('binding.users');
    }

    public function refuseBinding(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '2']);
        return redirect()->route('binding.users');
    }

    public function tenants()
    {
        $users = User::with('tenant')->where('status', '1')->where('type', '2')->get();
        return view('admin.users.index', [
            'title' => 'All Tenants Here',
            'users' => $users
        ]);
    }
    public function owners()
    {
        $users = User::with('owner')->where('status', '1')->where('type', '1')->get();
        return view('admin.users.index', [
            'title' => 'All Owners Here',
            'users' => $users
        ]);
    }
}