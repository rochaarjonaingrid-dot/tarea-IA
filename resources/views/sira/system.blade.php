@extends('layouts.app')

@section('title', 'SIRA Hazardous Waste Management System')

@section('content')
    <x-sira.header>Sistema de gestión ambiental</x-sira.header>
    <main class="mx-auto max-w-3xl px-4 py-8 sm:px-6">
        <x-sira.badge>REGULATORY OPERATIONS</x-sira.badge>
        <h1 class="mt-3 text-3xl font-bold leading-tight text-sira-petroleum">Hazardous Waste Management System</h1>
        <p class="mt-3 leading-7 text-sira-muted">Manage hazardous waste manifests, custody, and compliance documentation from one operational workspace.</p>
        <section class="my-5 grid grid-cols-2 gap-3">
            <x-sira.card><p class="text-2xl font-bold text-sira-petroleum">24</p><p class="mt-1 text-sm text-sira-muted">Active manifests</p></x-sira.card>
            <x-sira.card><p class="text-2xl font-bold text-sira-petroleum">3</p><p class="mt-1 text-sm text-sira-muted">Pending reviews</p></x-sira.card>
        </section>
        <x-sira.card class="mb-4"><h2 class="font-semibold">Manifest tracking</h2><p class="mt-2 text-sm leading-6 text-sira-muted">Follow each shipment from generator registration through transportation and final reception.</p><x-sira.button class="mt-4" :href="route('sira.manifests')">Open manifests</x-sira.button></x-sira.card>
        <x-sira.card><h2 class="font-semibold">Compliance documents</h2><p class="mt-2 text-sm leading-6 text-sira-muted">Review SEMARNAT documentation and verify signatures at each custody stage.</p><x-sira.button class="mt-4" :href="route('sira.documents')">View documents</x-sira.button></x-sira.card>
        <p class="mt-6 text-center text-xs text-slate-500">SIRA · Environmental compliance and custody tracking</p>
    </main>
@endsection
