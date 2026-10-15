@extends('layouts.app')

@section('title', 'Dashboard Operativo SIRA')

@section('content')
    <x-sira.header>Panel operativo</x-sira.header>
    <main class="mx-auto max-w-5xl px-4 py-6 sm:px-6">
        @if (session('status'))
            <p role="status" class="mb-4 rounded border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</p>
        @endif
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="text-sm text-sira-muted">Resumen de operaciones</p>
                <h1 class="mt-1 text-2xl font-bold">Dashboard Operativo</h1>
            </div>
            <x-sira.button :href="route('sira.manifests')">＋ Nuevo manifiesto</x-sira.button>
        </div>
        <section class="my-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-3" aria-label="Indicadores">
            <x-sira.card><p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Manifiestos activos</p><p class="my-2 text-3xl font-bold text-sira-petroleum">24</p><x-sira.badge>En seguimiento</x-sira.badge></x-sira.card>
            <x-sira.card><p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Residuos gestionados</p><p class="my-2 text-3xl font-bold text-sira-petroleum">12.8 t</p><p class="text-sm text-sira-muted">Periodo actual</p></x-sira.card>
            <x-sira.card><p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Pendientes de firma</p><p class="my-2 text-3xl font-bold text-sira-petroleum">3</p><x-sira.badge tone="warning">Requieren atención</x-sira.badge></x-sira.card>
        </section>
        <x-sira.card class="mb-4">
            <div class="mb-3 flex items-center justify-between"><h2 class="font-semibold">Actividad reciente</h2><a class="text-sm font-semibold text-sira-primary" href="{{ route('sira.manifests') }}">Ver todos</a></div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm"><thead class="text-xs uppercase tracking-wide text-slate-500"><tr><th class="py-2">Folio</th><th>Generador</th><th class="hidden py-2 sm:table-cell">Fecha</th><th class="py-2">Estado</th></tr></thead>
                    <tbody class="divide-y divide-slate-200"><tr><td class="py-3">SIRA-2026-084</td><td>Planta Norte</td><td class="hidden py-3 sm:table-cell">14 oct 2026</td><td><x-sira.badge tone="info">En tránsito</x-sira.badge></td></tr><tr><td class="py-3">SIRA-2026-083</td><td>Servicios Industriales</td><td class="hidden py-3 sm:table-cell">13 oct 2026</td><td><x-sira.badge tone="warning">Pendiente</x-sira.badge></td></tr></tbody>
                </table>
            </div>
        </x-sira.card>
        <x-sira.card><h2 class="font-semibold">Alertas de cumplimiento</h2><p class="mt-3 text-sm text-sira-muted"><x-sira.badge tone="warning">Próximo a vencer</x-sira.badge> Revisa los manifiestos que se acercan al límite de almacenamiento temporal.</p></x-sira.card>
    </main>
@endsection
