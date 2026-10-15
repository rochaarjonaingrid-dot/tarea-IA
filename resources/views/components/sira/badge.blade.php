@props(['tone' => 'success'])

@php
    $tones = [
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-amber-100 text-amber-800',
        'info' => 'bg-sky-100 text-sky-800',
        'danger' => 'bg-red-100 text-red-800',
    ];
@endphp

<span {{ $attributes->class(['inline-flex rounded-sm px-2 py-1 text-xs font-semibold', $tones[$tone] ?? $tones['info']]) }}>
    {{ $slot }}
</span>
