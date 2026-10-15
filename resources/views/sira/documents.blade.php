@extends('layouts.app')

@section('title', 'Documentos y PDF Manifiesto SEMARNAT')

@section('content')
    <x-sira.header><a href="{{ route('sira.manifests') }}" class="text-white">‹　Documentación del manifiesto</a></x-sira.header>
    <main class="mx-auto max-w-4xl px-4 py-6 sm:px-6">
        <p class="text-sm text-sira-muted">Folio SIRA-2026-084</p><div class="mt-1 flex flex-wrap items-center justify-between gap-3"><h1 class="text-2xl font-bold">Documentos y PDF</h1><x-sira.badge>En revisión</x-sira.badge></div>
        <x-sira.card class="my-5">
            <h2 class="font-semibold">Archivos del manifiesto</h2>
            @foreach ([['Manifiesto de entrega, transporte y recepción', 'PDF · 2.4 MB · Actualizado 14 oct 2026', 'Descargar'], ['Comprobante de recolección', 'PDF · 860 KB', 'Ver'], ['Certificado de disposición final', 'Pendiente de carga', '＋ Adjuntar']] as [$file, $metadata, $action])
                <div class="mt-3 flex flex-wrap items-center justify-between gap-3 rounded-md border border-slate-200 p-3"><div><p class="text-sm font-medium">{{ $file }}</p><p class="mt-1 text-xs text-slate-500">{{ $metadata }}</p></div><x-sira.button>{{ $action }}</x-sira.button></div>
            @endforeach
        </x-sira.card>
        <x-sira.card>
            <div class="flex flex-wrap items-center justify-between gap-3"><h2 class="font-semibold">Vista previa del manifiesto SEMARNAT</h2><x-sira.button>Imprimir PDF</x-sira.button></div>
            <article class="mt-4 min-h-80 border border-slate-300 p-4 text-slate-700 sm:p-6">
                <h3 class="text-center text-sm font-bold">MANIFIESTO DE ENTREGA, TRANSPORTE Y RECEPCIÓN DE RESIDUOS PELIGROSOS</h3>
                <p class="mt-4 text-sm">Folio: SIRA-2026-084</p>
                @foreach (['1. Datos del generador', '2. Información del residuo', '3. Transporte y recepción'] as $section)
                    <h4 class="mt-5 text-sm font-semibold">{{ $section }}</h4><div class="mt-2 space-y-3"><div class="h-7 border-b border-slate-300"></div><div class="h-7 border-b border-slate-300"></div></div>
                @endforeach
            </article>
        </x-sira.card>
    </main>
@endsection
