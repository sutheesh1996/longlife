<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Devicename;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        $overallCustomers = User::count();
        $activeUsers = User::where('payment_status', 1)->count();
        $inactiveUsers = User::where('payment_status', 0)->count();
        $newUsers = User::where('created_at', '>=', now()->subDays(30))->count();
        $users = User::paginate(10);
        $recentUsers = User::where('created_at', '>=', now()->subDay())->get();

        $recentPayments = User::where('payment_status', 1)
        ->where('updated_at', '>=', now()->subDay())
        ->get();

        return view('dashboard.index', compact('overallCustomers', 'activeUsers', 'inactiveUsers', 'newUsers', 'users', 'recentUsers', 'recentPayments'));
    }

    public function index1()
    {
        $users = User::paginate(10);

        // Check and update subscription status for each user
        foreach ($users as $user) {
            $user->isSubscriptionExpired(); // This will update the payment_status if necessary
        }

        return view('dashboard.show', compact('users'));
    }


    public function active_users()
    {
        $activeUsers = User::where('payment_status', 1)->count();
        $users = User::where('payment_status', 1)->paginate(10); // Only fetch active users

        return view('dashboard.active_users', compact('activeUsers', 'users'));
    }

    public function inactive_users()
    {
        $inactiveUsers = User::where('payment_status', 0)->count();
        $users = User::where('payment_status', 0)->paginate(10); // Only fetch inactive users

        return view('dashboard.inactive_users', compact('inactiveUsers', 'users'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile_number' => 'required|string|min:10|max:15|unique:users',
            'email' => 'nullable|string|email|unique:users', // Ensure email is nullable and valid email format
            'password' => 'nullable|string|min:6', // Ensure password is nullable and minimum length 6
            'date_of_birth' => 'nullable|date', // Ensure date_of_birth is nullable and valid date
            'gender' => 'nullable|string|in:male,female,other', // Ensure gender is nullable and one of the valid options
            'height' => 'nullable|numeric|min:0', // Ensure height is nullable and a valid number
            'weight' => 'nullable|numeric|min:0', // Ensure weight is nullable and a valid number
        ]);

        User::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : null, // Hash password if provided
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'User added successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'mobile_number' => 'required|string|min:10|max:15|unique:users,mobile_number,' . $user->id,
            'email' => 'string|unique:users,email,' . $user->id,
            'password' => 'string|min:6',
            'date_of_birth' => 'date',
            'gender' => 'string|in:male,female,other',
            'height' => 'numeric|min:0',
            'weight' => 'numeric|min:0'
        ]);

        $user->update([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'User deleted successfully');
    }

    public function subscription()
    {
        return view('subscription');
    }


public function assignDeviceForm($id)
{
    $user = User::findOrFail($id);
    $deviceNames = Devicename::pluck('device_id', 'id'); // Fetch device_id values
    return view('dashboard.assign_device', compact('user','deviceNames'));
}


public function assignDevice(Request $request, $id)
{
    $request->validate([
        'device_id' => 'required|string|unique:users,device_id'
    ]);

    $user = User::findOrFail($id);
    $user->update(['device_id' => $request->device_id]);

    return redirect()->route('dashboard')->with('success', 'Device assigned successfully');
}

public function usersWithDevices()
{
    $users = User::whereNotNull('device_id')->paginate(10);

    return view('dashboard.device_details', compact('users'));
}


public function editDeviceForm($id)
{
    $user = User::findOrFail($id);
    return view('dashboard.device_edit', compact('user'));
}

public function updateDevice(Request $request, $id)
{
    $request->validate([
        'device_id' => 'required|string|unique:users,device_id,' . $id,
    ]);

    $user = User::findOrFail($id);
    $user->update(['device_id' => $request->device_id]);

    return redirect()->route('users.with-devices')->with('success', 'Device ID updated successfully');
}


}
