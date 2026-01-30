@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 border-b-4 border-amber-600 text-sm font-bold leading-5 text-amber-700 bg-amber-50 rounded-t-lg focus:outline-none transition-all duration-200'
            : 'inline-flex items-center px-4 py-2 border-b-4 border-transparent text-sm font-semibold leading-5 text-gray-600 hover:text-amber-700 hover:bg-amber-50 hover:border-amber-300 rounded-t-lg focus:outline-none focus:text-amber-700 transition-all duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
