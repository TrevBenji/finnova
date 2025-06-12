<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        // Validate the form
        $request->validate([
            'site_name' => 'required|string',
            'contact_email' => 'required|email'
        ]);

        // Update .env file (you may choose database instead in a real app)
        $envPath = base_path('.env');
        if (File::exists($envPath)) {
            File::put($envPath, preg_replace('/APP_NAME=.*/', 'APP_NAME="'.$request->site_name.'"', File::get($envPath)));
            File::put($envPath, preg_replace('/CONTACT_EMAIL=.*/', 'CONTACT_EMAIL="'.$request->contact_email.'"', File::get($envPath)));
        }

        return redirect()->route('settings')->with('success', 'System settings updated successfully!');
    }
}