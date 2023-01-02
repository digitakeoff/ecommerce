<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'unique:'.User::class],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $slug = Str::slug(Str::title($request->first_name.' '.$request->last_name), '-');
        $slug_exist = User::where('slug', '=', $slug)->get();
        $slug = count($slug_exist)? $slug. '-' .count($slug_exist) + 1 : $slug;
        
        $props = (new User)->getFillables();

        $data = [];
        foreach($props as $prop)
            $data[$prop] = $request->input($prop);
        $data['slug'] = $slug;
        $data['role'] = 'customer';

        $user = User::create($data);

        // [
        //     'first_name' => Str::title($request->first_name),
        //     'last_name' => Str::title($request->last_name),
        //     'phone' => $request->phone,
        //     'city' => $request->city,
        //     'slug' => $slug,
        //     'address' => Str::title($request->address),
        //     'state' => $request->state,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
