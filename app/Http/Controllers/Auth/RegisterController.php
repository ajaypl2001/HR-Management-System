<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Models\roleTypeUser;
// use Hash;
use DB;

class RegisterController extends Controller
{
    // public function register()
    // {
    //     return view('auth.register');
    // }
    public function register()
    {
       
        $roles = roleTypeUser::all(); 

        // Pass roles to the view
        return view('auth.register', compact('roles'));
    }

    public function storeUser(Request $request)
    {
    //  dd($request->all());
      
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        
        
        try {
            
            User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'org_password' => $validated['password'],
                'status' => 'Active',
                'password' => Hash::make($validated['password']),
            ]);
           

           
            session()->flash('success', 'Account created successfully :)');
            return redirect()->route('login');

        } catch (\Exception $e) {
            
            Log::error('RegisterController@storeUser error: ' . $e->getMessage(), [
                'exception' => $e,
                'input' => $request->except(['password', 'password_confirmation']),
            ]);

            session()->flash('error', 'Failed to create account. Please try again.');
            return redirect()->back()->withInput();
        }
    }
}