@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:ring focus:ring-active focus:ring-opacity-100 rounded-md shadow-sm text-slate-700']) !!}>
