@extends('layouts.app')

@section('title', 'Editar Perfil y Credenciales')

@section('content')
    <x-sira.header><a href="{{ route('sira.dashboard') }}" class="text-white">‹　Configuración de cuenta</a></x-sira.header>
    <main class="mx-auto max-w-3xl px-4 py-6 sm:px-6">
        <p class="text-sm text-sira-muted">Cuenta y seguridad</p><h1 class="mt-1 text-2xl font-bold">Editar perfil</h1><p class="mt-2 text-sm text-sira-muted">Actualiza tu información de usuario y credenciales de acceso.</p>
        @if (session('status'))
            <p role="status" class="my-4 rounded border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</p>
        @endif
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <x-sira.card class="my-5">
                <h2 class="font-semibold">Información personal</h2>
                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <x-sira.field name="name" label="Nombre" :value="$user->name"/>
                    <x-sira.field name="last_name" label="Apellidos" :value="$user->last_name"/>
                </div>
                <div class="mt-4"><x-sira.field name="email" label="Correo electrónico" type="email" :value="$user->email"/></div>
                <div class="mt-4"><x-sira.field name="phone" label="Teléfono" type="tel" placeholder="+52" :value="$user->phone"/></div>
                <label for="role" class="mb-1 mt-4 block text-sm font-medium text-slate-700">Rol de usuario</label>
                <select id="role" name="role" class="w-full rounded border border-slate-300 bg-white px-3 py-2.5 text-sm">
                    <option value="Administrador de empresa" @selected(old('role', $user->role ?? 'Responsable ambiental') === 'Administrador de empresa')>Administrador de empresa</option>
                    <option value="Responsable ambiental" @selected(old('role', $user->role ?? 'Responsable ambiental') === 'Responsable ambiental')>Responsable ambiental</option>
                </select>
                @error('role')<p class="mt-1 text-sm text-red-700">{{ $message }}</p>@enderror
            </x-sira.card>
            <x-sira.card>
                <h2 class="font-semibold">Cambiar contraseña</h2><p class="mt-1 text-xs text-sira-muted">Deja estos campos vacíos si no deseas cambiarla.</p>
                <div class="mt-4 space-y-4"><x-sira.field name="current_password" label="Contraseña actual" type="password" autocomplete="current-password"/><x-sira.field name="new_password" label="Nueva contraseña" type="password" autocomplete="new-password"/><x-sira.field name="new_password_confirmation" label="Confirmar nueva contraseña" type="password" autocomplete="new-password"/></div>
            </x-sira.card>
            <div class="mt-4 flex justify-end gap-3"><x-sira.button variant="secondary" :href="route('sira.dashboard')">Cancelar</x-sira.button><x-sira.button type="submit">Guardar cambios</x-sira.button></div>
        </form>
    </main>
@endsection
