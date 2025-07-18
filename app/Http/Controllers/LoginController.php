<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerOtp;
use App\Models\AgentDetails;
use App\Models\ManagerDetails;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class LoginController extends Controller
{


    public function forgetPassword(Request $request)
    {
        $request->session()->forget('id');
        return view('forgetPassword');
    }

    public function resetPassword(Request $request)
    {

        $ID = $request->input('ID');
        $IDType = $request->input('IDType');

        if ($IDType == "ManagerID") {
            $managers = ManagerDetails::where('ManagerID', $ID)->first();
        } else {
            $managers = AgentDetails::where('AgentID', $ID)->first();
        }

        if (is_null($managers)) {
            return redirect()->back()->with('error', 'Enter valid ID');
        }

        $managerPhone = $managers->PhoneNo;
        $request->session()->flush();
        $request->session()->put('id', $ID);
        $request->session()->put('IDType', $IDType);
        $request->session()->put('phone', $managerPhone);

        $otp = mt_rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(2);

        $OTP = new CustomerOtp();
        $OTP->Phone = $managerPhone;
        $OTP->otp = $otp;
        $OTP->expire_at = $otpExpiry;
        $OTP->save();

        $message = 'Your OTP for password reset is ' . $otp;

        try {

            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");


            $client = new Client($account_id, $auth_token);

            $client->messages->create(
                $managerPhone,
                [
                    'from' => $twilio_number,
                    'body' => $message
                ]
            );
            info("SMS sent successfully");
        } catch (\Exception $e) {
            info("Error: " . $e->getMessage());
        }

        // // echo "<pre>";
        // // print_r(session()->all());
        return redirect()->route('passwordOTP');
    }

    public function showOTP()
    {
        return view('otpPage');
    }

    public function SubmitOTP(Request $request)
    {
        $request->validate(
            [
                'userOTP' => 'required|numeric|digits:6'
            ],
            [
                'userOTP.required' => '*Required',
                'userOTP.numeric' => '*OTP must be in mumeric',
                'userOTP.digits' => '*OTP must be 6 digits'
            ]
        );
        $Userotp = $request->input('userOTP');


        $managerPhone = session('phone');

        $DBotp = CustomerOtp::where('Phone', $managerPhone)
            ->where('expire_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->first();


        if ($DBotp == null) {
            return redirect()->route('passwordOTP')->with('error', 'OTP has expired. Please try again.');
        } else {
            $generatedOtp = $DBotp->otp;



            if ($Userotp == $generatedOtp) {


                return redirect()->route('newPassword');
            } else {
                $request->session()->forget('id');
                $request->session()->forget('IDType');
                $request->session()->forget('Phone');
                return redirect()->route('forgetPassword')->with('error', 'Invalid OTP');
            }
        }
    }

    public function NewPassword()
    {
        return view('newPassword');
    }
    public function setNewPassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
            ],
            [
                'password.required' => 'Password is required.',
                'password.string' => 'Password must be a string.',
                'password.min' => 'Password must be at least :min characters long.',
                'password.confirmed' => 'Password confirmation does not match.',
                'password_confirmation.required' => 'Confirm password is required.',
                'password_confirmation.string' => 'Confirm password must be a string.',
                'password_confirmation.min' => 'Confirm password must be at least :min characters long.',
            ]
        );

        $ID = session('id');
        $IDType = session('IDType');
        $password = $request->input('password');
        if ($IDType == "ManagerID") {
            $manager = ManagerDetails::where('ManagerID', $ID)->first();
        } else {
            $manager = AgentDetails::where('AgentID', $ID)->first();
        }


        if (is_null($manager)) {
            $request->session()->forget('id');
            $request->session()->forget('IDType');
            $request->session()->forget('Phone');
            return redirect('/forgetPassword')->with('error', 'No such user found');
        } else {
            $manager->Password = Hash::make($password);
            // $manager->Password = $password;
            $manager->save();
            $request->session()->forget('id');
            $request->session()->forget('IDType');
            $request->session()->forget('Phone');
            return redirect('/managerAccess')->with('message', 'Password changed successfully');
        }
    }


    //LOGOUT

    public function Logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Login');
    }

    //LOGIN

    public function LoginPage(Request $request)
    {
        $request->session()->forget('id');
        return view('loginpage');
    }
    public function Log(Request $request)
    {
        $IDType = $request->input('IDType');
        $ID = $request->input('ID');
        $password = $request->input('password');

        if ($IDType == "ManagerID") {
            $manager = ManagerDetails::where('ManagerID', $ID)->first();
        } else {
            $manager = AgentDetails::where('AgentID', $ID)->first();
        }



        if (is_null($manager)) {
            return redirect()->back()->with('message', 'No such user found or You do not have access rights.');
        }

        if (!Hash::check($request->input('password'), $manager->Password)) {
            return redirect()->back()->with('message', 'Invalid credentials.');
        }

        if ($manager->Access_Rights !== "yes") {
            return redirect()->back()->with('message', 'You do not have access rights.');
        }



        $managerPhone = $manager->PhoneNo;
        $request->session()->flush();
        $request->session()->put('id', $ID);
        $request->session()->put('IDType', $IDType);
        $request->session()->put('phone', $managerPhone);

        $otp = mt_rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(2);

        $OTP = new CustomerOtp();
        $OTP->Phone = $managerPhone;
        $OTP->otp = $otp;
        $OTP->expire_at = $otpExpiry;
        $OTP->save();

        $message = 'Your OTP for password reset is ' . $otp;

        try {

            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");


            $client = new Client($account_id, $auth_token);

            $client->messages->create(
                $managerPhone,
                [
                    'from' => $twilio_number,
                    'body' => $message
                ]
            );
            info("SMS sent successfully");
        } catch (\Exception $e) {
            info("Error: " . $e->getMessage());
        }

        // // echo "<pre>";
        // // print_r(session()->all());
        return redirect()->route('loginOTP');
    }

    public function LogOTP(Request $request)
    {
        $request->validate(
            [
                'userOTP' => 'required|numeric|digits:6'
            ],
            [
                'userOTP.required' => '*Required',
                'userOTP.numeric' => '*OTP must be in mumeric',
                'userOTP.digits' => '*OTP must be 6 digits'
            ]
        );
        $Userotp = $request->input('userOTP');


        $managerPhone = session('phone');

        $DBotp = CustomerOtp::where('Phone', $managerPhone)
            ->where('expire_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->first();


        if ($DBotp == null) {
            return redirect()->route('loginOTP')->with('error', 'OTP has expired. Please try again.');
        } else {
            $generatedOtp = $DBotp->otp;



            if ($Userotp == $generatedOtp) {
                if (session('IDType') == "ManagerID") {

                    $request->session()->forget('phone');
                    return redirect()->route('managerPage');
                } else {
                    $request->session()->forget('phone');
                    return redirect()->route('agentPage');
                }
            } else {
                $request->session()->forget('id');
                $request->session()->forget('IDType');
                $request->session()->forget('phone');
                return redirect()->route('forgetPassword')->with('error', 'Invalid OTP');
            }
        }
    }
}
