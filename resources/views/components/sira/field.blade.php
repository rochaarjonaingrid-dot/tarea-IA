@props(['name', 'label', 'type' => 'text', 'value' => null, 'placeholder' => null, 'autocomplete' => null])

<div>
    <label for="{{ $name }}" class="mb-1 block text-sm font-medium text-slate-700">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @if ($type !== 'password') value="{{ old($name, $value) }}" @endif
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @class([
            'w-full rounded border bg-white px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-sira-primary focus:outline-none focus:ring-1 focus:ring-sira-primary',
            'border-red-500' => $errors->has($name),
            'border-slate-300' => ! $errors->has($name),
        ])
    >
    @error($name)
        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
    @enderror
</div>
