<x-button.primary {{ $attributes->merge(['class' => 'bg-danger bg-none text-white py-2 px-4 rounded-xl hover:bg-danger/90'])}}>
    {{ $slot }}
</x-button.primary>