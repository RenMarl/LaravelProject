<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Check if the user has admin access (replace with your actual logic)
            if (Auth::attempt($credentials) && ($this->email === env('ADMIN_EMAIL') && $this->password === env('ADMIN_PASSWORD'))) {
                // Admin login logic
                session()->flash('message', 'You have successfully logged in as admin!');
                return $this->redirectRoute('admin', navigate: true);
            } else {
                session()->flash('message', 'You have successfully logged in!');
                return $this->redirectRoute('dashboard', navigate: true); // Redirect to user dashboard
            }
        }

        session()->flash('error', 'Invalid credentials!');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
// class Login extends Component
// {
//     #[Validate('required|email')]
//     public $email;

//     #[Validate('required')]
//     public $password;

//     public function login()
//     {
//         $this->validate();

//         $credentials = [
//             'email' => $this->email,
//             'password' => $this->password,
//         ];

//         if(Auth::attempt($credentials))
//         {
//             session()->flash('message', 'You have successfully logged in!');
 
//             return $this->redirectRoute('dashboard', navigate: true);
//         }
        
//         session()->flash('error', 'Invalid credentials!');
//     }   
//     public function render()
//     {
//         return view('livewire.login');
//     }
// }