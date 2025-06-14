<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Order; // Add this to import the Order model

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $paidOrders = Order::where('user_id', $user->id)
                        ->where('status', 'paid')
                        ->where('delivery_status', 'terkirim')
                        ->latest()
                        ->get();

        return view('profile.profile', compact('user', 'paidOrders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required|string|max:50|unique:users,username,'.$user->id,
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:20|unique:users,phone_number,'.$user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Remove avatar field from validated data
        $userData = collect($validated)->except(['avatar'])->toArray();
        
        // Handle avatar removal
        if ($request->has('remove_avatar') && $request->input('remove_avatar') == '1') {
            // Delete the old avatar file if it exists
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }
            $userData['avatar'] = null;
        }
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete the old avatar file if it exists
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }
            
            // Store the new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $userData['avatar'] = $avatarPath;
        }
        
        $user->update($userData);
        
        return redirect('/profil')->with('success', 'Profile updated successfully!');
    }
}