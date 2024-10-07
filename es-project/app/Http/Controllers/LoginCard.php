<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginCard extends Controller
{
    public function dashboard()
    {
    return view(view: 'login_card.index');
    }
}
