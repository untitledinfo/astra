<button
    {{ $attributes->merge(['class' => 'relative overflow-hidden flex items-center gap-2 justify-center bg-primary text-white text-sm font-semibold hover:bg-primary/90 hover:shadow-[0_6px_24px_-6px_hsl(var(--color-primary)/0.6)] py-2.5 lg:py-2 px-4.5 rounded-xl w-full duration-300 cursor-pointer disabled:cursor-not-allowed disabled:opacity-50']) }}>
    @if (theme('glow_effects', true))
    <span class="astra-shine"></span>
    @endif
    @if (isset($type) && $type === 'submit')
        <div role="status" wire:loading>
            <x-ri-loader-5-fill aria-hidden="true" class="size-6 me-2 fill-background animate-spin" />
            <span class="sr-only">Loading...</span>
        </div>
        <div wire:loading.remove class="relative flex items-center gap-2">
            {{ $slot }}
        </div>
    @else
        <span class="relative flex items-center gap-2">{{ $slot }}</span>
    @endif
</button>
