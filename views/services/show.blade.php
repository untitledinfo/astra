<div class="container mt-14">
    @if($invoice = $service->invoices()->where('status', 'pending')->first())
    <div class="w-full mb-4">
        <div class="bg-warning/15 border-l-4 border-warning text-warning p-4 rounded-xl">
            <p class="font-medium">
                ⚠️ {{ __('services.outstanding_invoice') }}
                <a href="{{ route('invoices.show', $invoice)}}"
                    class="underline hover:opacity-80 underline-offset-2">{{ __('services.view_and_pay') }}</a>.
            </p>
        </div>
    </div>
    @endif
    <div class="astra-card astra-card-beam p-6 mt-2">
        <div class="flex flex-col md:flex-row justify-between items-center mb-2">
            <div class="flex items-center gap-3">
                <span class="shrink-0 inline-flex items-center justify-center size-11 rounded-xl bg-gradient-to-br from-primary to-secondary text-white shadow-[0_8px_30px_-8px_hsl(var(--color-primary)/0.6)]">
                    <x-ri-server-line class="size-5" />
                </span>
                <h1 class="text-2xl font-semibold">{{ $service->label }}</h1>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4 my-4">
            <div>
                <h4 class="text-lg font-semibold">{{ __('services.product_details') }}:</h4>
                <div class="mt-2">
                    @include('services.partials.label')
                    <div class="flex items-center text-base">
                        <span class="mr-2">{{ __('services.price') }}:</span>
                        <span class="text-base/50">{{ $service->formattedPrice }}</span>
                    </div>
                    @if($service->plan->type == 'recurring')
                    <div class="flex items-center text-base">
                        <span class="mr-2">{{ __('services.billing_cycle') }}:</span>
                        <span class="text-base/50">{{ __('services.every_period', [
                            'period' => $service->plan->billing_period > 1 ? $service->plan->billing_period : '',
                            'unit' => trans_choice(__('services.billing_cycles.' . $service->plan->billing_unit),
                            $service->plan->billing_period)
                            ])
                            }}</span>
                    </div>
                    @if($service->expires_at)
                    <div class="flex items-center text-base">
                        <span class="mr-2">{{ __('services.renews_on') }}:</span>
                        <span class="text-base/50">
                            {{ $service->expires_at->format('M d, Y') }}
                        </span>
                    </div>
                    @endif
                    @endif
                    <div class="flex items-center text-base">
                        <span class="mr-2">{{ __('services.status') }}:</span>
                        @if($service->cancellation && $service->status == 'active')
                        <span class="font-semibold text-warning">
                            {{ __('services.statuses.cancellation_pending') }}
                        </span>
                        @else
                        <span
                            class="font-semibold @if ($service->status == 'active') text-success @elseif($service->status == 'cancelled') text-inactive @else text-warning @endif">
                            {{ __('services.statuses.' . $service->status) }}
                        </span>
                        @endif
                    </div>
                    @include('services.partials.billing-agreement')
                    <br>
                    @foreach ($fields as $field)
                    <div class="flex items-center text-base">
                        <span class="mr-2">{{ $field['label'] }}:</span>
                        <span class="text-base/50">{{ $field['text'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @if($service->cancellable || $service->upgradable || count($buttons) > 0)
            <div>
                <h4 class="text-lg font-semibold">{{ __('services.actions') }}:</h4>
                <div class="mt-2 flex flex-row gap-2 flex-wrap">
                    @if($service->upgradable)
                    <a href="{{ route('services.upgrade', $service->id) }}">
                        <x-button.primary class="h-fit !w-fit">
                            <span>{{ __('services.upgrade') }}</span>
                        </x-button.primary>
                    </a>
                    @endif
                    @if($service->upgrade()->where('status', 'pending')->exists())
                    <x-button.primary class="h-fit !w-fit"
                        @click="Alpine.store('notifications').addNotification([{message: '{{ __('services.upgrade_pending') }}', type: 'error'}])">
                        <span>{{ __('services.upgrade') }}</span>
                    </x-button.primary>
                    @endif
                    @if($service->cancellable)
                    <x-button.danger class="h-fit !w-fit" wire:click="$set('showCancel', true)">
                        <span wire:loading.remove wire:target="$set('showCancel', true)">{{ __('services.cancel')
                            }}</span>
                        <x-loading target="$set('showCancel', true)" />
                    </x-button.danger>
                    @endif
                    @if($showCancel)
                    <x-modal open="true"
                        title="{{ __('services.cancellation', ['service' => $service->product->name]) }}"
                        width="max-w-3xl">
                        <livewire:services.cancel :service="$service" />
                        <x-slot name="closeTrigger">
                            <div class="flex gap-4">
                                <button wire:click="$set('showCancel', false)" @click="open = false"
                                    class="text-base">
                                    <x-ri-close-fill class="size-6" />
                                </button>
                            </div>
                        </x-slot>
                    </x-modal>
                    @endif
                </div>
                <div class="mt-2 flex flex-row gap-2 flex-wrap">
                    @foreach ($buttons as $button)
                    <!-- If the button has a function then call it when clicked -->
                    @if (isset($button['function']))
                    <x-button.primary class="h-fit !w-fit" wire:click="goto('{{ $button['function'] }}')">
                        {{ $button['label'] }}
                    </x-button.primary>
                    @else
                    <a href="{{ $button['url'] }}"
                        @if(!empty($button['target'])) target="{{ $button['target'] }}" @endif
                        @if(($button['target'] ?? null) === '_blank') rel="noopener noreferrer" @endif>
                        <x-button.primary class="h-fit !w-fit">
                            {{ $button['label'] }}
                        </x-button.primary>
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    @if (count($views) > 0)
    <div class="astra-card p-4 mt-4">
        @if (count($views) > 1)
        <div class="flex w-fit mb-2 flex-row flex-wrap">
            @foreach ($views as $view)
            <button wire:click="changeView('{{ $view['name'] }}')"
                class="px-4 py-2 -mb-px focus:outline-none transition-colors {{ $view['name'] == $currentView ? 'border-b-2 border-primary font-semibold text-primary' : 'text-muted border-b border-neutral hover:text-base' }}">
                {{ $view['label'] }}
            </button>
            @endforeach
        </div>
        @endif

        <!-- show loading spinner -->
        <x-loading target="changeView" />
        <div wire:loading.remove wire:target="changeView">
            {!! $extensionView !!}
        </div>
    </div>
    @endif
</div>