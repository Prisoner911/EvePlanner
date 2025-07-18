<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customerDetails;
use App\Models\AgentUpdate;
use App\Models\CustomerOtp;
use Twilio\Rest\Client;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function generateOTP(Request $request)
    {
        $request->validate(
            [
                'firstName' => 'required|alpha|min:2|max:255',
                'lastName' => 'required|alpha|min:2|max:255',
                'email' => 'required|email|max:255',
                'phoneNumber' => 'required|numeric|digits:10',
                'evetype' => 'required|string|max:255',
                'venue' => 'required|string|max:255',
                'eventDate' => 'required|date',
                'numberOfGuests' => 'required|numeric',
                'communication' => 'required|string|max:255',
                'startTime' => 'required',
                'endTime' => 'required',
                'service' => 'nullable',
                'additionalComments' => 'nullable|string|max:1000',
            ],
            [
                'firstName.required' => 'First name is required.',
                'firstName.alpha' => 'First name must contain alphabetic characters only.',
                'firstName.min' => 'First name must be at least :min characters.',
                'firstName.max' => 'First name may not be greater than :max characters.',
                'lastName.required' => 'Last name is required.',
                'lastName.alpha' => 'Last name must contain alphabetic characters only.',
                'lastName.min' => 'Last name must be at least :min characters.',
                'lastName.max' => 'Last name may not be greater than :max characters.',
                'email.required' => 'email is required.',
                'email.email' => 'email must be a valid email address.',
                'email.max' => 'email may not be greater than :max characters.',
                'phoneNumber.required' => 'Phone number is required.',
                'phoneNumber.numeric' => 'Phone number must contain only numeric characters.',
                'phoneNumber.digits_between' => 'Phone number must be between :min and :max digits.',
                'evetype.required' => 'Event type is required.',
                'evetype.string' => 'Event type must be a string.',
                'evetype.max' => 'Event type may not be greater than :max characters.',
                'venue.required' => 'venue is required.',
                'venue.string' => 'venue must be a string.',
                'venue.max' => 'venue may not be greater than :max characters.',
                'eventDate.required' => 'Event date is required.',
                'eventDate.date' => 'Event date must be a valid date.',
                'numberOfGuests.required' => 'Guests amount is required.',
                'numberOfGuests.numeric' => 'Guests amount must be a number.',
                'communication.required' => 'Communication method is required.',
                'communication.string' => 'Communication method must be a string.',
                'communication.max' => 'Communication method may not be greater than :max characters.',
                'startTime.required' => 'Start time is required.',
                // 'startTime.date_format' => 'Start time must be in valid HH:MM:SS format.',
                'endTime.required' => 'End time is required.',
                // 'endTime.date_format' => 'End time must be in valid HH:MM:SS format.',
                'additionalComments.string' => 'Additional comments must be a string.',
                'additionalComments.max' => 'Additional comments may not be greater than :max characters.',
            ]
        );

        // echo "<pre>";
        // print_r($request->all());

        $customerFirstName = ucfirst($request->input('firstName'));
        $customerLastName = ucfirst($request->input('lastName'));
        $customerEmail = $request->input('email');
        $countryCode = "+91";
        $customerPhone = $countryCode . $request->input('phoneNumber');
        $customerEveType = $request->input('evetype');
        $customerVenue = $request->input('venue');
        $customerEventDate = $request->input('eventDate');
        $customerNumberOfGuests = $request->input('numberOfGuests');
        $customercommunication = $request->input('communication');
        $customerStartTime = $request->input('startTime');
        $customerEndTime = $request->input('endTime');
        $customerService = $request->input('service');
        $customerAdditionalComments = $request->input('additionalComments');

        //store in session

        $request->session()->forget('id');
        $request->session()->put('firstName', $customerFirstName);
        $request->session()->put('lastName', $customerLastName);
        $request->session()->put('email', $customerEmail);
        $request->session()->put('phoneNumber', $customerPhone);
        $request->session()->put('evetype', $customerEveType);
        $request->session()->put('venue', $customerVenue);
        $request->session()->put('eventDate', $customerEventDate);
        $request->session()->put('numberOfGuests', $customerNumberOfGuests);
        $request->session()->put('communication', $customercommunication);
        $request->session()->put('startTime', $customerStartTime);
        $request->session()->put('endTime', $customerEndTime);
        $request->session()->put('service', $customerService);
        $request->session()->put('additionalComments', $customerAdditionalComments);

        //generate otp
        $otp = mt_rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(2);


        $customerOtp = new CustomerOtp();
        $customerOtp->Phone = $customerPhone;
        $customerOtp->otp = $otp;
        $customerOtp->expire_at = $otpExpiry;
        $customerOtp->save();

        $message = 'Login OTP for your booking is ' . $otp;

        // try {

        //     $account_id = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");

        //     $client = new Client($account_id, $auth_token);
        //     $client->messages->create(
        //         $customerPhone,
        //         [
        //             'from' => $twilio_number,
        //             'body' => $message
        //         ]
        //     );
        //     info("SMS sent successfully");
        // } catch (\Exception $e) {
        //     info("Error: " . $e->getMessage());
        // }

        // // // echo "<pre>";
        // // // print_r(session()->all());
        return redirect()->route('bookingOTP');
    }

    public function store(Request $request)
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



        $customerFirstName = session('firstName');
        $customerLastName = session('lastName');
        $customerEmail = session('email');
        $customerPhone = session('phoneNumber');
        $customerEveType = session('evetype');
        $customerVenue = session('venue');
        $customerEventDate = session('eventDate');
        $customerNumberOfGuests = session('numberOfGuests');
        $customercommunication = session('communication');
        $customerStartTime = session('startTime');
        $customerEndTime = session('endTime');
        $customerService = session('service');
        $customerAdditionalComments = session('additionalComments');
        $Userotp = $request->input('userOTP');








        $DBotp = CustomerOtp::where('Phone', $customerPhone)
            ->where('expire_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->first();


        if ($DBotp == null) {
            return redirect()->route('bookingOTP')->with('error', 'OTP has expired. Please try again.');
        } else {
            $generatedOtp = $DBotp->otp;



            if ($Userotp == $generatedOtp) {


                $customers = new customerDetails();
                $customers->FirstName = $customerFirstName;
                $customers->LastName = $customerLastName;
                $customers->email = $customerEmail;
                $customers->PhoneNo = $customerPhone;
                $customers->EventType =  $customerEveType;
                $customers->Venue = $customerVenue;
                $customers->EventDate = $customerEventDate;
                $customers->GuestsAmount =  $customerNumberOfGuests;
                $customers->CommunicationMethod = $customercommunication;
                $customers->StartTime =  $customerStartTime;
                $customers->EndTime = $customerEndTime;
                $customers->Services = json_encode($customerService);
                $customers->AdditionalComments = $customerAdditionalComments;
                $customers->AssignedAgent = 0;
                $customers->EventStatus = "pending";
                $customers->save();

                $request->session()->forget('firstName');
                $request->session()->forget('lastName');
                $request->session()->forget('email');
                $request->session()->forget('phoneNumber');
                $request->session()->forget('evetype');
                $request->session()->forget('venue');
                $request->session()->forget('eventDate');
                $request->session()->forget('numberOfGuests');
                $request->session()->forget('communication');
                $request->session()->forget('startTime');
                $request->session()->forget('endTime');
                $request->session()->forget('service');
                $request->session()->forget('additionalComments');

                return redirect()->route('home')->with('success', 'Cheers! event booked. Our agent will contact you soon.');

                // Cache::forget('otp' . $customerPhone);

            } else {

                $request->session()->forget('firstName');
                $request->session()->forget('lastName');
                $request->session()->forget('email');
                $request->session()->forget('phoneNumber');
                $request->session()->forget('evetype');
                $request->session()->forget('venue');
                $request->session()->forget('eventDate');
                $request->session()->forget('numberOfGuests');
                $request->session()->forget('communication');
                $request->session()->forget('startTime');
                $request->session()->forget('endTime');
                $request->session()->forget('service');
                $request->session()->forget('additionalComments');

                return redirect('bookingpage')->with('error', 'Invalid OTP. Please try again.');
            }
        }
    }

    public function otpPage()
    {
        return view('otpPage');
    }
}
