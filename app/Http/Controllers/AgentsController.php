<?php

namespace App\Http\Controllers;

use App\Models\AgentDetails;
use App\Models\customerDetails;
use App\Models\ManagerDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function managerPage()
    {
        return view('ManagerLayouts/ManagerPage');
    }

    public function customerDetails()
    {
        return view('customerDetails');
    }
    public function viewMore($id)
    {

        $customer = customerDetails::where('ApplicationNo', $id)->first();
        if (is_null($customer)) {
            redirect('showCustomers');
        } else {
            // echo "<pre>";
            // print_r($customer->Services);
            $customerPhone = substr($customer->PhoneNo, 3);
            $checkboxData = json_decode($customer->Services);
            $data = compact('customer', 'checkboxData', 'customerPhone');
            // echo "<pre>";
            // print_r($checkboxData->all());
            return view('customerDetails')->with($data);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $ApplicationNo = $request->input('ApplicationNo');
        // print $ApplicationNo;
        $customer = customerDetails::where('ApplicationNo', $ApplicationNo)->first();
        // echo "<pre>";
        // print_r($customer->all());
        if (is_null($customer)) {
            return redirect()->back()->with('message', 'No customer found');
        } else {

            $customer->FirstName = ucfirst(strtolower($request->input('firstName')));
            $customer->LastName = ucfirst(strtolower($request->input('lastName')));
            $customer->email = $request->input('email');
            $customer->PhoneNo = "+91" . $request->input('phoneNumber');
            $customer->EventType = $request->input('evetype');
            $customer->Venue = $request->input('venue');
            $customer->EventDate = $request->input('eventDate');
            $customer->GuestsAmount = $request->input('numberOfGuests');
            $customer->CommunicationMethod = $request->input('communication');
            $customer->StartTime = $request->input('startTime');
            $customer->EndTime = $request->input('endTime');
            $customer->Services = json_encode($request->input('service'));
            $customer->AdditionalComments = $request->input('additionalComments');
            $customer->save();
            return redirect()->route('ViewMore', ['id' => $ApplicationNo])->with('success', 'Customer details updated successfully');
        }
    }






    public function MarkStatus(Request $request, $id)
    {
        $customer = customerDetails::where('ApplicationNo', $id)->first();


        if (is_null($customer)) {
            return response()->json(['message' => 'No user found'], 404);
        } else {
            $customer->EventStatus = $request->input('eventStatus');
            $customer->save();

            return response()->json(['message' => 'Status updated successfully'], 200);
        }
    }

    public function assignAgent($id)
    {
        $agents = AgentDetails::paginate(5);


        return view('assignAgentList', compact('agents'));
    }

    public function setAgent($id, $agentid)
    {
        $customer = customerDetails::where('ApplicationNo', $id)->first();
        // dd($customer);
        $customer->AssignedAgent = $agentid;
        $customer->save();
        return redirect()->back();
    }

    public function viewEventsAssigned(Request $request, $agentid)
    {
        $query = customerDetails::query();

        if ($request->ajax()) {
            if ($request->searchInput) {
                $query->where('ApplicationNo', 'LIKE', '%' . $request->searchInput . '%')->where('AssignedAgent', $agentid);
            }

            // Paginate the results
            $customers = $query->paginate(10);

            return response()->json(['customers' => $customers]);
        } else {

            $customers = $query->where('AssignedAgent', $agentid)->paginate(5);
            // dd($customers);
            // Get the pagination elements
            return view('viewAssignedEvents', compact('customers'));
        }
    }


    public function viewAssignedEvents(Request $request, $id, $agentid)
    {

        $query = customerDetails::query();

        if ($request->ajax()) {
            if ($request->searchInput) {
                $query->where('ApplicationNo', 'LIKE', '%' . $request->searchInput . '%')->where('AssignedAgent', $agentid);
            }

            // Paginate the results
            $customers = $query->paginate(10);

            return response()->json(['customers' => $customers]);
        } else {

            $customers = $query->where('AssignedAgent', $agentid)->paginate(5);
            // dd($customers);
            // Get the pagination elements
            return view('viewAssignedEvents', compact('customers'));
        }
    }

    public function showCustomer(Request $request)
    {
        $query = customerDetails::query();

        if ($request->ajax()) {
            $customers = $query->where('ApplicationNo', 'LIKE', '%' . $request->searchInput . '%')
                ->orWhere('FirstName', 'LIKE', '%' . $request->searchInput . '%')
                ->orWhere('LastName', 'LIKE', '%' . $request->searchInput . '%')
                ->orWhere('PhoneNo', 'LIKE', '%' . $request->searchInput . '%')
                ->orWhere('email', 'LIKE', '%' . $request->searchInput . '%')->orderBy('created_at', 'Desc')->paginate(5);

            return response()->json(['customers' => $customers]);
        } else {
            $customers = $query->orderBy('created_at', 'Desc')->paginate(5);
            // Get the pagination elements
            return view('showCustomers', compact('customers'));
        }
    }

    public function showAgent(Request $request)
    {
        $query = AgentDetails::query();

        if ($request->ajax()) {
            if ($request->searchInput) {
                $query->where('AgentID', 'LIKE', '%' . $request->searchInput . '%')
                    ->orWhere('Name', 'LIKE', '%' . $request->searchInput . '%');
            }

            // Paginate the results
            $agents = $query->paginate(10);

            return response()->json(['agents' => $agents]);
        } else {
            $agents = $query->paginate(10);

            return view('showAgents', compact('agents'));
        }
    }

    public function addAgent()
    {
        return view('addAccess');
    }

    public function storeAgent(Request $request)
    {
        $request->validate([
            'agentName' => 'required|regex:/^[a-zA-Z\s]+$/',
            'agentPhone' => 'required|string|max:10',
            'agentEmail' => 'required|email|max:255',
            'agentSpecialty' => 'max:255',
            'agentAddress' => 'required|string|max:255',
            'agentPassword' => 'required|string|min:8',
            'agentStatus' => 'required|in:yes,no',
        ], [
            'agentStatus.required' => "Select the access rights",
        ]);

        // Create a new agentDetails instance
        $agent = new AgentDetails();
        $agent->Name = ucwords(strtolower($request->input('agentName')));
        $agent->PhoneNo = "+91" . $request->input('agentPhone');
        $agent->Email = $request->input('agentEmail');
        if ($request->input('agentSpecialty') == "") {
            $agent->Specialty = "-";
        } else {
            $agent->Specialty = $request->input('agentSpecialty');
        }

        $agent->Address = $request->input('agentAddress');
        // $agent->Password = $request->input('agentPassword');
        $agent->Password = Hash::make($request->input('agentPassword'));
        $agent->Access_Rights = $request->input('agentStatus');
        $agent->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('status', 'Agent added successfully');
    }

    public function AgentStatus(Request $request, $id)
    {

        $agent = AgentDetails::where('AgentID', $id)->first();
        // dd($id, $agent);

        if (is_null($agent)) {


            return view('showAgents')->with('message', 'No user found');
        } else {

            $agent->Access_Rights = $request->input('agentStatus');
            $agent->save();

            return redirect()->route('agentSearch')->with('message', 'Status updated successfully');
        }
    }

    public function changeData($id)
    {
        $agent = AgentDetails::where('AgentID', $id)->first();
        if (is_null($agent)) {

            return redirect()->route('agentSearch');
        } else {
            $agentPhone = substr($agent->PhoneNo, 3);


            return view('editAgent', compact('agent', 'agentPhone'));
        }
    }

    public function editData(Request $request, $id)
    {
        $agent = AgentDetails::where('AgentID', $id)->first();
        if (is_null($agent)) {


            // return redirect()->route('agentSearch');
            return response()->json(['message' => 'Error Status not updated'], 200);
        } else {
            $agent->Name = ucwords(strtolower($request->input('agentName')));
            $agent->PhoneNo = "+91" . $request->input('agentPhone');
            $agent->Email = $request->input('agentEmail');
            $agent->Address = $request->input('agentAddress');
            $agent->Access_Rights = $request->input('agentStatus');
            $agent->save();
            // return redirect()->route('agentSearch');
            return response()->json(['message' => 'Error Status not updated'], 200);
        }
    }


    //Agent page code starts here.
    public function agentPage()
    {
        return view('ManagerLayouts/AgentPage');
    }

    public function showCustomerAgents(Request $request)
    {
        $query = customerDetails::query()->where('AssignedAgent', session('id'));

        if ($request->ajax()) {
            if ($request->searchInput) {
                $query->where('ApplicationNo', 'LIKE', '%' . $request->searchInput . '%');
            }

            // Paginate the results
            $customers = $query->paginate(10);

            return response()->json(['customers' => $customers]);
        } else {
            // Get the pagination elements
            $customers = $query->paginate(5);
            return view('showCustomersAgents', compact('customers'));
        }
    }



    public function deleteAgent($id)
    {
        $agent = AgentDetails::where('AgentID', $id)->first();
        if (is_null($agent)) {


            // return redirect()->route('agentSearch');
            return redirect()->route('agentSearch');
        } else {

            $agent->delete();
            // return redirect()->route('agentSearch');
            return redirect()->route('agentSearch');
        }
    }

    //MANAGER CODE

    public function showManager(Request $request)
    {
        $query = ManagerDetails::query();

        if ($request->ajax()) {
            if ($request->searchInput) {
                $query->where('ManagerID', 'LIKE', '%' . $request->searchInput . '%')
                    ->orWhere('Name', 'LIKE', '%' . $request->searchInput . '%');
            }

            // Paginate the results
            $managers = $query->paginate(10);

            return response()->json(['managers' => $managers]);
        } else {
            $managers = $query->paginate(10);

            return view('showManager', compact('managers'));
        }
    }

    public function addManager()
    {
        return view('addManager');
    }


    public function storeManager(Request $request)
    {
        $request->validate([
            'managerName' => 'required|regex:/^[a-zA-Z\s]+$/',
            'managerPhone' => 'required|string|max:10',
            'managerEmail' => 'required|email|max:255',
            'managerAddress' => 'required|string|max:255',
            'managerPassword' => 'required|string|min:8',

        ]);
        // dd($request->all());
        // Create a new agentDetails instance
        $manager = new ManagerDetails();
        $manager->Name = ucwords(strtolower($request->input('managerName')));
        $manager->PhoneNo = "+91" . $request->input('managerPhone');
        $manager->Email = $request->input('managerEmail');
        $manager->Address = $request->input('managerAddress');
        $manager->Access_Rights = "yes";
        $manager->Password = Hash::make($request->input('managerPassword'));
        // $manager->Password = $request->input('managerPassword');
        $manager->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('status', 'Manager added successfully');
    }





    public function changeManagerData($id)
    {
        $manager = ManagerDetails::where('ManagerID', $id)->first();
        if (is_null($manager)) {


            return redirect()->route('managerSearch');
        } else {
            $managerPhone = substr($manager->PhoneNo, 3);
            return view('editManager', compact('manager', 'managerPhone'));
        }
    }

    public function editManagerData(Request $request, $id)
    {

        $manager = ManagerDetails::where('ManagerID', $id)->first();
        if (is_null($manager)) {


            // return redirect()->route('agentSearch');
            return response()->json(['message' => 'Error Status not updated'], 200);
        } else {
            $manager->Name = ucwords(strtolower($request->input('managerName')));
            $manager->PhoneNo = "+91" . $request->input('managerPhone');
            $manager->Email = $request->input('managerEmail');
            $manager->Address = $request->input('managerAddress');
            $manager->Access_Rights = $request->input('managerStatus');
            $manager->save();
            // return redirect()->route('agentSearch');
            return response()->json(['message' => 'Error Status not updated'], 200);
        }
    }

    public function deleteManager($id)
    {
        $agent = ManagerDetails::where('ManagerID', $id)->first();
        if (is_null($agent)) {

            return redirect()->route('managerSearch');
        } else {

            $agent->delete();

            return redirect()->route('managerSearch');
        }
    }
}
