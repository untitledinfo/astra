@php
    // Astra: flag emoji per language code, for a nicer language switcher.
    // Falls back to a globe icon for any locale not in this list.
    $astraFlags = [
        'en' => '🇬🇧', 'en_us' => '🇺🇸', 'es' => '🇪🇸', 'fr' => '🇫🇷', 'de' => '🇩🇪',
        'it' => '🇮🇹', 'pt' => '🇵🇹', 'pt_br' => '🇧🇷', 'nl' => '🇳🇱', 'pl' => '🇵🇱',
        'ru' => '🇷🇺', 'uk' => '🇺🇦', 'tr' => '🇹🇷', 'ar' => '🇸🇦', 'ur' => '🇵🇰',
        'hi' => '🇮🇳', 'bn' => '🇧🇩', 'id' => '🇮🇩', 'vi' => '🇻🇳', 'th' => '🇹🇭',
        'ja' => '🇯🇵', 'ko' => '🇰🇷', 'zh' => '🇨🇳', 'zh_tw' => '🇹🇼', 'sv' => '🇸🇪',
        'no' => '🇳🇴', 'da' => '🇩🇰', 'fi' => '🇫🇮', 'cs' => '🇨🇿', 'ro' => '🇷🇴',
        'hu' => '🇭🇺', 'el' => '🇬🇷', 'he' => '🇮🇱', 'fa' => '🇮🇷',
    ];
    $astraFlag = fn ($code) => $astraFlags[strtolower($code)] ?? '🌐';
@endphp
<x-dropdown>
    <x-slot:trigger>
        <div class="text-sm text-base font-semibold text-nowrap flex items-center gap-1.5">
            @if(count($locales) > 1)
            <span>{{ $astraFlag(app()->getLocale()) }}</span>
            {{ config('app.available_locales')[app()->getLocale()] }}
            @endif
            @if(count($locales) > 1 && count($this->currencies) > 1 && Cart::items()->isEmpty())
            <span class="text-base/50 font-semibold">|</span>
            @endif
            @if(count($this->currencies) > 1 && Cart::items()->isEmpty())
            {{ collect($this->currencies)->firstWhere('value', $this->currentCurrency)['label'] ?? $this->currentCurrency }}
            @endif
        </div>
    </x-slot:trigger>
    <x-slot:content>
        @if(count($locales) > 1)
        <div>
            <strong class="block p-2 text-xs font-semibold uppercase text-base/50"> Language </strong>
            <x-select wire:model.live="currentLocale" :options="collect($locales)->map(fn($code) => [
                'value' => $code,
                'label' => $astraFlag($code) . '  ' . config('app.available_locales')[$code]
                ])->values()->toArray()" placeholder="Select language" />
        </div>
        @endif
        @if(count($this->currencies) > 1 && Cart::items()->isEmpty())
        <div>
            <strong class="block p-2 text-xs font-semibold uppercase text-base/50"> Currency </strong>
            <x-select wire:model.live="currentCurrency" :options="$this->currencies" placeholder="Select currency" />
        </div>
        @endif
    </x-slot:content>
</x-dropdown>
