<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function forgetpassword(Request $request)
    {
        return view('auth.forgetpassword');
    }

    public function generateOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Send OTP via email
        Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

        return view('otp.verify', ['email' => $user->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric'
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', Carbon::now())
            ->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // OTP is valid
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        // Redirect to password reset form
        return view('auth.reset_password', ['email' => $user->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.login')->with('status', 'Password has been reset successfully.');
    }
}
