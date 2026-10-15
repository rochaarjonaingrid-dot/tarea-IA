@extends('layouts.app')

@section('title', 'Iniciar sesión | SIRA')

@section('content')
    <x-sira.header>Iniciar sesión</x-sira.header>
    <main class="mx-auto max-w-lg px-4 py-8 sm:px-6">
        <p class="text-sm text-sira-muted">Acceso a la plataforma</p>
        <h1 class="mt-1 text-2xl font-bold">Iniciar sesión</h1>
        <p class="mt-2 text-sm leading-6 text-sira-muted">Ingresa tus credenciales para continuar.</p>
        @if (session('status'))
            <p role="status" class="my-4 rounded border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</p>
        @endif
        <form method="POST" action="{{ route('login.authenticate') }}" class="mt-5 space-y-4">
            @csrf
            <x-sira.card>
                <div class="space-y-4">
                    <x-sira.field name="email" label="Correo electrónico" type="email" placeholder="nombre@empresa.com" autocomplete="email"/>
                    <x-sira.field name="password" label="Contraseña" type="password" autocomplete="current-password"/>
                    <label class="flex items-center gap-2 text-sm text-sira-muted">
                        <input type="checkbox" name="remember" value="1" @checked(old('remember')) class="rounded border-slate-300 text-sira-primary focus:ring-sira-primary">
                        Recordarme
                    </label>
                </div>
            </x-sira.card>
            <x-sira.button type="submit" class="w-full">Iniciar sesión</x-sira.button>
            <p class="text-center text-xs text-slate-500">¿Aún no tienes cuenta? <a class="font-semibold text-sira-primary" href="{{ route('register') }}">Crear cuenta</a></p>
        </form>
    </main>
@endsection
