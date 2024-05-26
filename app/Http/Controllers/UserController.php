<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return Inertia::render('User/Index', [
            'users' => $users,
        ]);
    }

//    public function update(Request $request, $id)
//    {
//        $user = User::findOrFail($id);
//
//        // Custom validation logic (if needed)
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:users,email,' . $id,
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['errors' => 'err']);
//        }
//
//        // If validation passes, update the user
//        $user->update($request->only(['name', 'email']));
//
//        return redirect()->back()->with(['success' => 'User updated successfully']);
//    }

//    public function update(UserRequest $request, $id)
//    {
//        $user = User::findOrFail($id);
//
//        // Validate and update user
//        try {
//            $user->update($request->validated());
//        } catch (ValidationException $e) {
//            return response()->json(['errors' => $e->errors()], 422);
//        }
//
//        return response()->json(['message' => 'User updated successfully']);
//    }

    public function update(UserRequest $request, $id)
    {
        $params = $request->all();

        User::find($id)->update([
            'name' => data_get($params, 'name'),
            'email' => data_get($params, 'email'),
        ]);

        return session()->flash('success', 'Update success');
//        return response()->json(['success' => 'User updated successfully']);
//        return Inertia::render('User/Index', ['success' => 'Update success']);
//        return redirect()->back()->with(['success' => 'Update success']);
    }
}
