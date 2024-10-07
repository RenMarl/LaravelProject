<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationCard extends Controller
{
    public function dashboard()
    {
    return view(view: 'registration_card.index');
    }
}
