<div class="container mt-14 space-y-4">
    <x-page-header icon="services" title="{{ __('navigation.services') }}" subtitle="Everything you have running with us, in one place." />

    @forelse ($services as $service)
    <a href="{{ route('services.show', $service) }}" wire:navigate>
        <div class="astra-card astra-card-hover astra-card-beam astra-reveal p-4 mb-4" data-astra-delay="{{ min($loop->iteration, 8) }}">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-3">
            <div class="bg-secondary/10 p-2 rounded-xl">
                <x-ri-instance-line class="size-5 text-secondary" />
            </div>
            <span class="font-medium">{{ $service->label }}</span>
            </div>
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full
                @if ($service->status == 'active') text-success bg-success/15
                @elseif($service->status == 'suspended' || $service->status == 'cancelled') text-inactive bg-inactive/15
                @else text-warning bg-warning/15
                @endif">
                <span class="size-1.5 rounded-full astra-status-dot
                    @if ($service->status == 'active') bg-success
                    @elseif($service->status == 'suspended' || $service->status == 'cancelled') bg-inactive
                    @else bg-warning
                    @endif"></span>
                {{ ucfirst($service->status) }}
            </span>
        </div>
        <div class="text-base text-sm flex gap-1">
            {{
                in_array($service->plan->type, ['recurring']) ?  __('services.every_period', [
                'period' => $service->plan->billing_period > 1 ? $service->plan->billing_period : '',
                'unit' => trans_choice(__('services.billing_cycles.' . $service->plan->billing_unit),
                $service->plan->billing_period)
                ]) : '' }}
                @if($service->expires_at && $service->expires_at > now())
                -  {{ __('services.renews_in') }} 
                <x-tooltip :message="$service->expires_at->format('M d, Y')">
                    {{ $service->expires_at->longAbsoluteDiffForHumans() }}
                </x-tooltip>
                @endif
            </div>
        </div>
    </a>
    @empty
    <div class="astra-card p-6 text-center">
        <x-ri-inbox-line class="size-8 mx-auto text-muted mb-2" />
        <p class="text-sm text-muted">{{ __('services.no_services') }}</p>
    </div>
    @endforelse

    {{ $services->links() }}
</div>
