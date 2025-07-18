<?php

namespace App\Http\Controllers;

use App\Models\customerDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Ratings;

class RatingController extends Controller
{
    public function ratingPage()
    {
        return view('RatingPage');
    }


    public function ratingInput(Request $request)
    {
        $request->validate(
            [
                'rateName' => 'required|regex:/^[a-zA-Z\s]+$/',
                'ratePhone' => 'required|numeric|digits:10',
                'rate' => 'required',
                'rateComments' => 'required|max:450'
            ],
            [
                'rateName.required' => "Please fill your name",
                'rateName.regex' => "Name should consist of only Alphabets",
                'ratePhone.required' => "Enter your phone number",
                'ratePhone.numeric' => "Phone number should be a valid numeric",
                'ratePhone.dighits' => "Phone number should be of 10 digits",
                'rate.required' => "Please rate us",
                'rateComments.required' => 'Give us some message or feedback',
                'rateComments.max' => 'Maximum 450 characters allowed'

            ]
        );

        $ratings = new Ratings();
        $ratings->Name = ucwords(strtolower($request->input('rateName')));
        $ratings->Phone = $request->input('ratePhone');
        $ratings->Rating = $request->input('rate');
        $ratings->Comments = $request->input('rateComments');
        $ratings->save();

        return redirect()->back()->with('message', 'Thankyou for your valuable feedback');
    }


    public function ratinglink($id)
    {
        $customers = customerDetails::where('ApplicationNo', $id)->first();
        if (is_null($customers)) {
            return redirect()->back()->with('error', 'Failed to send the rating link');
        }
        $customerPhone = $customers->PhoneNo;
        $ratingLink = '/rateUs';
        $message = "Dear customer, please rate our service by clicking on the following link:" . $ratingLink;

        // try {

        //     $account_id = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");


        //     $client = new Client($account_id, $auth_token);

        //     $client->messages->create(
        //         $managerPhone,
        //         [
        //             'from' => $twilio_number,
        //             'body' => $message
        //         ]
        //     );
        //     return redirect()->back()->with('message','Link sent successfully');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Failed to send the rating link');
        // }

    }
}
