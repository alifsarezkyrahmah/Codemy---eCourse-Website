@props(['active'])

@php
// Periksa apakah pengguna sudah login dan memiliki properti 'role'
$isRoleHome = auth()->check() && request()->routeIs(auth()->user()->role . '.*');

// Tentukan kelas berdasarkan kondisi
$classes = ($active ?? false)
            ? ($isRoleHome
                ? 'inline-flex items-center px-1 pt-1 border-b-4 border-white text-sm font-mono font-semibold leading-5 text-white focus:outline-none focus:border-sky-700 transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-sky-400 text-sm font-mono font-semibold leading-5 text-gray-900 focus:outline-none focus:border-sky-700 transition duration-150 ease-in-out')
            : ($isRoleHome
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-mono font-semibold leading-5 text-white hover:text-gray-500 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-mono font-semibold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out');
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
