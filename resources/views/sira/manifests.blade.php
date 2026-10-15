@extends('layouts.app')

@section('title', 'Gestión de Manifiestos SIRA')

@section('content')
    <x-sira.header>Manifiestos</x-sira.header>
    <main class="mx-auto max-w-5xl px-4 py-6 sm:px-6">
        <p class="text-sm text-sira-muted">Control documental</p>
        <div class="mt-1 flex flex-wrap items-center justify-between gap-3"><h1 class="text-2xl font-bold">Gestión de Manifiestos</h1><x-sira.button :href="route('sira.documents')">＋ Crear manifiesto</x-sira.button></div>
        <x-sira.card class="my-5">
            <h2 class="font-semibold">Buscar y filtrar</h2>
            <div class="mt-3 grid gap-3 sm:grid-cols-2"><label class="sr-only" for="manifest-search">Buscar manifiesto</label><input id="manifest-search" type="search" placeholder="Buscar por folio o generador" class="rounded border border-slate-300 px-3 py-2.5 text-sm focus:border-sira-primary focus:outline-none"><label class="sr-only" for="manifest-status">Estado</label><select id="manifest-status" class="rounded border border-slate-300 bg-white px-3 py-2.5 text-sm"><option>Todos los estados</option><option>En tránsito</option><option>Pendiente</option><option>Concluido</option></select></div>
        </x-sira.card>
        @foreach ([
            ['SIRA-2026-084', 'Residuos de mantenimiento industrial', 'Planta Norte', '14 oct 2026', 'Transportista: Logística Ambiental', 'En tránsito', 'info'],
            ['SIRA-2026-083', 'Solventes y materiales contaminados', 'Servicios Industriales', '13 oct 2026', 'Falta firma de recepción', 'Pendiente', 'warning'],
            ['SIRA-2026-082', 'Envases con residuos peligrosos', 'Operaciones Centro', '10 oct 2026', 'Documentación completa', 'Concluido', 'success'],
        ] as [$folio, $waste, $generator, $date, $detail, $status, $tone])
            <x-sira.card class="mb-3">
                <div class="flex flex-wrap items-start justify-between gap-3"><div><p class="text-xs font-semibold tracking-wide text-slate-500">FOLIO {{ $folio }}</p><h2 class="mt-1 font-semibold">{{ $waste }}</h2></div><x-sira.badge :tone="$tone">{{ $status }}</x-sira.badge></div>
                <p class="mt-2 text-sm text-sira-muted">Generador: {{ $generator }} · {{ $date }}</p>
                <div class="mt-3 flex flex-wrap items-center justify-between gap-2"><span class="text-xs text-slate-500">{{ $detail }}</span><a class="text-sm font-semibold text-sira-primary" href="{{ route('sira.documents') }}">Ver detalle →</a></div>
            </x-sira.card>
        @endforeach
    </main>
@endsection
