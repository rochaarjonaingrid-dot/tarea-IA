@props(['href' => null, 'variant' => 'primary', 'type' => 'button'])

@php
    $variants = [
        'primary' => 'bg-sira-primary text-white hover:bg-sira-primary-dark',
        'secondary' => 'border border-sira-petroleum bg-white text-sira-petroleum hover:bg-slate-50',
    ];
    $classes = 'inline-flex items-center justify-center rounded px-4 py-2.5 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-sira-primary focus:ring-offset-2 ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class([$classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class([$classes]) }}>{{ $slot }}</button>
@endif
