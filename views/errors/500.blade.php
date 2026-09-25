<x-app-layout>
    <x-slot name="title">
        {{ __('errors.500.title') }}
    </x-slot>

    <div class="container flex flex-col items-center justify-center text-center py-24 animate-astra-in">
        <span class="astra-eyebrow mb-6">
            <span class="astra-eyebrow-dot"></span>
            500
        </span>
        <h1 class="text-5xl font-extrabold tracking-tight sm:text-7xl astra-shimmer-text">
            {{ __('errors.500.title') }}
        </h1>
        <p class="mt-6 text-lg font-medium text-muted sm:text-xl/8 max-w-lg">
            {{ __('errors.500.message') }}
        </p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('home') }}" wire:navigate>
                <x-button.primary class="!w-auto px-6">
                    {{ __('errors.404.return_home') }}
                    <span class="astra-btn-arrow">→</span>
                </x-button.primary>
            </a>
        </div>
    </div>
</x-app-layout>
