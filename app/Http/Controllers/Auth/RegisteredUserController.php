<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'role' => ['required', 'numeric', 'between:1,2'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.required' => 'El nombre es obligatorio.',
                'name.string'   => 'El nombre debe ser texto válido.',
                'name.max'      => 'El nombre no debe superar los 255 caracteres.',

                'email.required'  => 'El correo electrónico es obligatorio.',
                'email.string'    => 'El correo electrónico debe ser texto válido.',
                'email.email'     => 'El correo electrónico no tiene un formato válido.',
                'email.max'       => 'El correo electrónico no debe superar los 255 caracteres.',
                'email.unique'    => 'Este correo electrónico ya está registrado.',

                'role.required' => 'El rol es obligatorio.',
                'role.numeric'  => 'El rol seleccionado no es válido.',
                'role.between'  => 'El rol seleccionado no es válido.',

                'password.required'  => 'La contraseña es obligatoria.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('vacants.index', absolute: false));
    }
}
