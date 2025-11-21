<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'in:light,dark,auto',
            'timezone' => 'timezone',
            'week_start' => 'in:monday,sunday',
        ]);

        $user = Auth::user();

        // Set attributes individually untuk menghindari mass-assignment issues
        if (array_key_exists('theme', $validated)) {
            $user->theme = $validated['theme'];
        }
        if (array_key_exists('timezone', $validated)) {
            $user->timezone = $validated['timezone'];
        }
        if (array_key_exists('week_start', $validated)) {
            $user->week_start = $validated['week_start'];
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
