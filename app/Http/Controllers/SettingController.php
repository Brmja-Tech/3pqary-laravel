<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.pages.settings.create', compact('settings'));
    }

    public function create()
    {
        return view('dashboard.pages.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email|max:255',
            'socialLink1' => 'nullable|string',
            'socialLink2' => 'nullable|string',
            'socialLink3' => 'nullable|string',
            'socialLink4' => 'nullable|string',
        ]);

        Setting::create($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting created successfully!');
    }

    public function edit(Setting $setting)
    {
        return view('dashboard.pages.settings.create', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email|max:255',
            'socialLink1' => 'nullable|string',
            'socialLink2' => 'nullable|string',
            'socialLink3' => 'nullable|string',
            'socialLink4' => 'nullable|string',
        ]);

        $setting->update($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully!');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully!');
    }
}
