<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return view('auth.passwords.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('auth.verify', ['token' => $token], function($message) use ($request) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to($request->email)->subject('Reset Password Notification');
        });
        // Mail::raw('This is a test email from HRApp via Brevo SMTP.', function ($message) {
        //     $message->to('ajaypal@opulencedigitech.com')
        //         ->subject('HRApp SMTP Test');
        // });


        flash()->success('We have e-mailed your password reset link! :)');
        return redirect()->back();
    }
}
