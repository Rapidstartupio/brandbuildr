<?php

namespace App\Http\Controllers\Auth;

use Wave\Http\Controllers\Auth\RegisterController as AuthRegisterController;

class RegisterController extends AuthRegisterController
{
    // public function showRegistrationForm()
    // {
    // 	return redirect()->route('dashboard-onboarding');
    // }

    public function dashboardOnboarding($step = "01")
    {
        return view("theme::onboarding.$step");
    }
}
