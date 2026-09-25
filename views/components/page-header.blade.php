@props(['icon' => null, 'title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'astra-page-header astra-card astra-card-beam astra-reveal flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-6 mb-6']) }}>
    <div class="relative flex items-center gap-4">
        @if ($icon)
        <span class="shrink-0 inline-flex items-center justify-center size-12 rounded-xl bg-gradient-to-br from-primary to-secondary text-white shadow-[0_8px_30px_-8px_hsl(var(--color-primary)/0.6)]">
            @switch($icon)
                @case('ticket')
                    <x-ri-customer-service-2-line class="size-6" />
                    @break
                @case('services')
                    <x-ri-server-line class="size-6" />
                    @break
                @case('invoices')
                    <x-ri-file-list-3-line class="size-6" />
                    @break
                @default
                    <x-ri-dashboard-line class="size-6" />
            @endswitch
        </span>
        @endif
        <div>
            <h1 class="text-2xl font-bold text-base">{{ $title }}</h1>
            @if ($subtitle)
            <p class="text-sm text-muted mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
    @isset($actions)
    <div class="relative flex items-center gap-2">
        {{ $actions }}
    </div>
    @endisset
</div>
