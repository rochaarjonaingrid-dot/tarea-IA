<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'company' => ['required', 'string', 'max:255'],
            'rfc' => ['required', 'string', 'max:13', 'unique:company_profiles,rfc'],
            'industry' => ['required', Rule::in(['manufactura', 'servicios'])],
            'employees' => ['required', Rule::in(['1-50', '51-250'])],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:120'],
            'state' => ['required', 'string', 'max:120'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        $user = DB::transaction(function () use ($validated): User {
            $user = User::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'role' => 'Responsable ambiental',
                'password' => $validated['password'],
            ]);

            CompanyProfile::create([
                'user_id' => $user->id,
                'company_name' => $validated['company'],
                'rfc' => strtoupper($validated['rfc']),
                'industry' => $validated['industry'],
                'employee_range' => $validated['employees'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
            ]);

            return $user;
        });

        Auth::login($user);
        request()->session()->regenerate();

        return redirect()->route('sira.dashboard')->with('status', 'La cuenta de empresa se creó correctamente.');
    }
}
