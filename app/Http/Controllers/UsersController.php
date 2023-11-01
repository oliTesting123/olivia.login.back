<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users=DB::table('users')
                ->select('id','name','email')
                ->get();
        
        return $users;
       
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
       

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);
        } else {
            return response()->json(['messagge' => 'User not faund.'], 404);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string',
        ]);

        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully', 'product' => $user], 200);

    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $deletedUser = $user;
        
        $user->delete();

        return response()->json(['message' => 'User removed', 'data' => $deletedUser], 200);
    }
}
