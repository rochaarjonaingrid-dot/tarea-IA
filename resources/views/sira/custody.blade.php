@extends('layouts.app')

@section('title', 'Trazabilidad y Custodia SIRA')

@section('content')
    <x-sira.header>Trazabilidad</x-sira.header>
    <main class="mx-auto max-w-3xl px-4 py-6 sm:px-6">
        <p class="text-sm text-sira-muted">Seguimiento de envío</p><div class="mt-1 flex flex-wrap items-center justify-between gap-3"><h1 class="text-2xl font-bold">Custodia del residuo</h1><x-sira.badge tone="info">En tránsito</x-sira.badge></div>
        <x-sira.card class="my-5 grid gap-4 sm:grid-cols-2"><div><p class="text-xs font-semibold text-slate-500">FOLIO</p><p class="mt-1 font-semibold">SIRA-2026-084</p></div><div><p class="text-xs font-semibold text-slate-500">RESIDUO</p><p class="mt-1 font-semibold">Solventes usados</p></div></x-sira.card>
        <x-sira.card class="mb-4"><h2 class="font-semibold">Ruta de transporte</h2><div class="mt-3 grid min-h-44 place-items-center rounded-md bg-gradient-to-br from-green-50 to-green-100 p-5 text-center text-sm font-medium text-green-900">Generador　→　Transportista　→　Destino final</div><p class="mt-3 text-xs text-slate-500">Última ubicación registrada: Centro de distribución, Querétaro</p></x-sira.card>
        <x-sira.card>
            <h2 class="mb-5 font-semibold">Cadena de custodia</h2>
            <ol class="ml-2 border-l-2 border-green-200">
                @foreach ([['Residuo registrado', '14 oct 2026 · 08:15 · Planta Norte'], ['Entrega al transportista', '14 oct 2026 · 09:40 · Firma verificada'], ['En tránsito al destino', '14 oct 2026 · 10:05 · Custodia activa'], ['Recepción en destino final', 'Pendiente']] as [$event, $time])
                    <li class="relative pb-6 pl-7 last:pb-0"><span class="absolute -left-[9px] top-0 h-4 w-4 rounded-full border-[3px] border-sira-primary bg-white"></span><strong class="block text-sm">{{ $event }}</strong><span class="mt-1 block text-xs text-slate-500">{{ $time }}</span></li>
                @endforeach
            </ol>
        </x-sira.card>
        <x-sira.button class="mt-4" :href="route('sira.documents')">Ver manifiesto</x-sira.button>
    </main>
@endsection
