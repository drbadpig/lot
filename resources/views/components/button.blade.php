<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-graphics border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-graphicsLight active:bg-graphics focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
