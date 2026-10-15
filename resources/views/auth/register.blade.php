@extends('layouts.app')

@section('title', 'Crear Cuenta SIRA')

@section('content')
    <x-sira.header>Registro de empresa</x-sira.header>
    <main class="mx-auto max-w-3xl px-4 py-6 sm:px-6">
        <p class="text-sm text-sira-muted">Registro de empresa</p><h1 class="mt-1 text-2xl font-bold">Crear cuenta SIRA</h1><p class="mt-2 text-sm leading-6 text-sira-muted">Completa la información para registrar tu empresa y comenzar a gestionar tus residuos.</p>
        <div class="my-4 rounded-md bg-sira-primary p-4 text-white"><strong>Registro de empresa</strong><p class="mt-1 text-sm text-green-50">Prepara tus datos fiscales y de contacto antes de continuar.</p></div>
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf
            <x-sira.card>
                <h2 class="font-semibold">Datos fiscales y registro</h2>
                <div class="mt-3 grid gap-4 sm:grid-cols-2"><x-sira.field name="company" label="Razón social" placeholder="Nombre de la empresa"/><x-sira.field name="rfc" label="RFC" placeholder="RFC de la empresa"/>
                    <div><label for="industry" class="mb-1 block text-sm font-medium text-slate-700">Giro o actividad</label><select id="industry" name="industry" class="w-full rounded border border-slate-300 bg-white px-3 py-2.5 text-sm"><option value="">Selecciona una actividad</option><option value="manufactura" @selected(old('industry') === 'manufactura')>Manufactura</option><option value="servicios" @selected(old('industry') === 'servicios')>Servicios</option></select>@error('industry')<p class="mt-1 text-sm text-red-700">{{ $message }}</p>@enderror</div>
                    <div><label for="employees" class="mb-1 block text-sm font-medium text-slate-700">Tamaño de empresa</label><select id="employees" name="employees" class="w-full rounded border border-slate-300 bg-white px-3 py-2.5 text-sm"><option value="">Selecciona una opción</option><option value="1-50" @selected(old('employees') === '1-50')>1–50 empleados</option><option value="51-250" @selected(old('employees') === '51-250')>51–250 empleados</option></select>@error('employees')<p class="mt-1 text-sm text-red-700">{{ $message }}</p>@enderror</div>
                </div>
            </x-sira.card>
            <x-sira.card>
                <h2 class="font-semibold">Información de contacto</h2>
                <div class="mt-3 grid gap-4 sm:grid-cols-2"><x-sira.field name="name" label="Nombre" placeholder="Nombre"/><x-sira.field name="last_name" label="Apellidos" placeholder="Apellidos"/><x-sira.field name="email" label="Correo electrónico" type="email" placeholder="nombre@empresa.com" autocomplete="email"/><x-sira.field name="phone" label="Teléfono" type="tel" placeholder="+52"/></div>
            </x-sira.card>
            <x-sira.card>
                <h2 class="font-semibold">Ubicación de la empresa</h2><div class="mt-3 space-y-4"><x-sira.field name="address" label="Dirección" placeholder="Calle y número"/><div class="grid gap-4 sm:grid-cols-2"><x-sira.field name="city" label="Ciudad" placeholder="Ciudad"/><x-sira.field name="state" label="Estado" placeholder="Estado"/></div></div>
            </x-sira.card>
            <x-sira.card>
                <h2 class="font-semibold">Credenciales de acceso</h2><div class="mt-3 space-y-4"><x-sira.field name="password" label="Contraseña" type="password" autocomplete="new-password"/><x-sira.field name="password_confirmation" label="Confirmar contraseña" type="password" autocomplete="new-password"/></div>
            </x-sira.card>
            <label class="flex items-start gap-2 text-xs text-sira-muted"><input type="checkbox" name="terms" value="1" @checked(old('terms')) class="mt-0.5 rounded border-slate-300 text-sira-primary focus:ring-sira-primary"><span>Acepto los términos de servicio y el aviso de privacidad de SIRA.</span></label>
            @error('terms')<p class="text-sm text-red-700">{{ $message }}</p>@enderror
            @if ($errors->has('registration'))
                <p role="alert" class="text-sm text-red-700">{{ $errors->first('registration') }}</p>
            @endif
            <x-sira.button type="submit" class="w-full">Crear cuenta de empresa</x-sira.button>
            <p class="text-center text-xs text-slate-500">¿Ya tienes una cuenta? <a class="font-semibold text-sira-primary" href="{{ route('login') }}">Inicia sesión</a></p>
        </form>
    </main>
@endsection
