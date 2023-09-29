<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function whiteLabel()
    {
        return view('theme::dashboard.settings.white-label');
    }

    public function saveWhiteLabel(Request $request)
    {
        try {
            $request->validate([
                'dark_logo' => 'image',
                'light_logo' => 'image',
            ]);
            $user = auth()->user();
            if (!empty($request->hasFile('dark_logo'))) {
                $logoName = time() . '-dark.' . $request->dark_logo->getClientOriginalExtension();
                $request->dark_logo->storeAs('logos', $logoName, 'public');
                $user->theme_dark_logo = $logoName;
            }
            if (!empty($request->hasFile('light_logo'))) {
                $logoName = time() . '-light.' . $request->light_logo->getClientOriginalExtension();
                $request->light_logo->storeAs('logos', $logoName, 'public');
                $user->theme_light_logo = $logoName;
            }


            $user->theme = $request->user_theme;
            $user->theme_button_color = $request->button_color;
            $user->theme_text_color = $request->text_color;
            $user->theme_line_color = $request->line_color;
            $user->save();

            return redirect(route('settings.white-label'))->with(['message' => 'Theme options updated!', 'message_type' => 'success']);
        } catch (\Exception $e) {
            return back()->with(['message' => $e->getMessage(), 'message_type' => 'danger']);
        }
    }
}
