@php
    // Astra: real flag images (via flagcdn.com) per language code.
    // Falls back to a globe icon for any locale not in this list.
    $astraCountryCodes = [
        'en' => 'gb', 'en_us' => 'us', 'es' => 'es', 'fr' => 'fr', 'de' => 'de',
        'it' => 'it', 'pt' => 'pt', 'pt_br' => 'br', 'nl' => 'nl', 'pl' => 'pl',
        'ru' => 'ru', 'uk' => 'ua', 'tr' => 'tr', 'ar' => 'sa', 'ur' => 'pk',
        'hi' => 'in', 'bn' => 'bd', 'id' => 'id', 'vi' => 'vn', 'th' => 'th',
        'ja' => 'jp', 'ko' => 'kr', 'zh' => 'cn', 'zh_tw' => 'tw', 'sv' => 'se',
        'no' => 'no', 'da' => 'dk', 'fi' => 'fi', 'cs' => 'cz', 'ro' => 'ro',
        'hu' => 'hu', 'el' => 'gr', 'he' => 'il', 'fa' => 'ir',
    ];
    $astraFlagUrl = fn ($code) => isset($astraCountryCodes[strtolower($code)])
        ? 'https://flagcdn.com/w40/' . $astraCountryCodes[strtolower($code)] . '.png'
        : null;
@endphp
<div class="flex items-center gap-1.5" x-data="{ langOpen: false }">
    @if(count($locales) > 1)
    <div class="relative">
        <button type="button" @click="langOpen = !langOpen" @click.outside="langOpen = false"
            class="flex items-center gap-1.5 text-sm font-semibold px-2 py-1 rounded-lg hover:bg-background-secondary transition-colors">
            @if ($astraFlagUrl(app()->getLocale()))
            <img src="{{ $astraFlagUrl(app()->getLocale()) }}" alt="" class="w-5 h-3.5 object-cover rounded-[2px] border border-neutral/50" loading="lazy">
            @else
            <x-ri-global-line class="size-4" />
            @endif
            <span>{{ config('app.available_locales')[app()->getLocale()] }}</span>
            <x-ri-arrow-down-s-line class="size-4 text-muted transition-transform" x-bind:class="langOpen ? 'rotate-180' : ''" />
        </button>
        <div x-show="langOpen" x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="absolute right-0 mt-2 w-52 max-h-80 overflow-y-auto astra-card p-1.5 z-50">
            @foreach ($locales as $code)
            <button type="button" wire:click="$set('currentLocale', '{{ $code }}')" @click="langOpen = false"
                class="w-full flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-sm hover:bg-background transition-colors {{ $code === app()->getLocale() ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                @if ($astraFlagUrl($code))
                <img src="{{ $astraFlagUrl($code) }}" alt="" class="w-5 h-3.5 object-cover rounded-[2px] border border-neutral/50 shrink-0" loading="lazy">
                @else
                <x-ri-global-line class="size-4 shrink-0" />
                @endif
                <span class="truncate">{{ config('app.available_locales')[$code] }}</span>
            </button>
            @endforeach
        </div>
    </div>
    @endif

    @if(count($locales) > 1 && count($this->currencies) > 1 && Cart::items()->isEmpty())
    <span class="text-base/30 font-semibold">|</span>
    @endif

    @if(count($this->currencies) > 1 && Cart::items()->isEmpty())
    <x-dropdown>
        <x-slot:trigger>
            <div class="text-sm text-base font-semibold text-nowrap px-1">
                {{ collect($this->currencies)->firstWhere('value', $this->currentCurrency)['label'] ?? $this->currentCurrency }}
            </div>
        </x-slot:trigger>
        <x-slot:content>
            <div>
                <strong class="block p-2 text-xs font-semibold uppercase text-base/50"> Currency </strong>
                <x-select wire:model.live="currentCurrency" :options="$this->currencies" placeholder="Select currency" />
            </div>
        </x-slot:content>
    </x-dropdown>
    @endif
</div>
