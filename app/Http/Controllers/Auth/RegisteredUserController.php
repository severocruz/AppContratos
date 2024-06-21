<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'a_paterno'=> ['required','alpha:ascii', 'string', 'max:45'],
            'a_materno'=> ['required','alpha:ascii', 'string', 'max:45'],
            'nombres'=> ['required','alpha:ascii', 'string', 'max:60'],
            'ci'=> ['required', 'string', 'max:15'],
            'id_dep'=> ['required','integer'],
            'name' => ['required', 'string', 'max:60'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'direccion' => ['required', 'string', 'max:60'],
            'telefono' => ['required','string', 'max:60'],
            'id_estus',
            'id_tipous',
            'id_uscrea',
            'id_usmodif'
            
        ]);

        $user = User::create([
             'a_paterno'=>$request->a_paterno,
            'a_materno'=>$request->a_materno,
            'nombres'=>$request->nombres,
            'ci'=>$request->ci,
            'id_dep'=>$request->id_dep,
            'name' =>$request->name,
            //'password' =>$request->password,
            'password' => Hash::make($request->password),
            'email' =>$request->email,
            'direccion' =>$request->direccion,
            'telefono' =>$request->telefono,
            'id_estus'=>$request->id_estus,
            'id_tipous'=>$request->id_tipous,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
