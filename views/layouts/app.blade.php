<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(in_array(app()->getLocale(), config('app.rtl_locales'))) dir="rtl" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Paymenter') }}
        @isset($title)
        - {{ $title }}
        @endisset
    </title>

    <meta name="description" content="{{ $description ?? theme('seo_description') }}">
    @if (theme('seo_keywords'))
    <meta name="keywords" content="{{ theme('seo_keywords') }}">
    @endif
    <meta name="robots" content="{{ theme('seo_index', true) ? 'index, follow' : 'noindex, nofollow' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @livewireStyles
    @vite(['themes/' . config('settings.theme') . '/js/app.js', 'themes/' . config('settings.theme') . '/css/app.css'], config('settings.theme'))
    @include('layouts.colors')

    @if (theme('custom_css'))
    <style>{!! theme('custom_css') !!}</style>
    @endif

    @if (config('settings.favicon'))
    <link rel="icon" href="{{ Storage::url(config('settings.favicon')) }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name', 'Paymenter') }}">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ isset($title) ? config('app.name', 'Paymenter') . ' - ' . $title : config('app.name', 'Paymenter') }}">
    <meta name="title" content="{{ isset($title) ? config('app.name', 'Paymenter') . ' - ' . $title : config('app.name', 'Paymenter') }}">
    <meta property="og:description" content="{{ $description ?? theme('seo_description') }}">
    @php $ogImage = $image ?? theme('seo_og_image'); @endphp
    @if ($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="image" content="{{ $ogImage }}">
    @endif

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="{{ $ogImage ? 'summary_large_image' : 'summary' }}">
    <meta name="twitter:title" content="{{ isset($title) ? config('app.name', 'Paymenter') . ' - ' . $title : config('app.name', 'Paymenter') }}">
    <meta name="twitter:description" content="{{ $description ?? theme('seo_description') }}">
    @if ($ogImage)
    <meta name="twitter:image" content="{{ $ogImage }}">
    @endif
    @if (theme('twitter_handle'))
    <meta name="twitter:site" content="{{ theme('twitter_handle') }}">
    @endif

    <meta name="theme-color" content="{{ theme('dark-primary', theme('primary')) }}">

    {{-- Structured data --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => config('app.name', 'Paymenter'),
        'url' => url('/'),
        ...(theme('seo_og_image') ? ['logo' => theme('seo_og_image')] : []),
        ...(theme('discord_url') ? ['sameAs' => [theme('discord_url')]] : []),
    ], JSON_UNESCAPED_SLASHES) !!}
    </script>

    {!! hook('head') !!}
</head>

<body class="w-full bg-background text-base min-h-screen flex flex-col antialiased font-sans relative"
    x-cloak
    x-data="{
        theme: $persist('{{ theme('default_appearance', 'dark') }}').as('theme_mode'),
        systemDark: window.matchMedia('(prefers-color-scheme: dark)').matches,
        scrolled: false,
        init() {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                this.systemDark = e.matches;
            });
            window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 8; }, { passive: true });
        },
        get isDark() {
            return this.theme === 'dark' || (this.theme === 'system' && this.systemDark);
        }
    }"
    :class="{'dark': isDark}"
>
    {!! hook('body') !!}

    <div id="astra-progress" class="astra-progress-bar" aria-hidden="true"></div>

    @if (theme('grid_background', true))
    <div class="astra-grid-bg astra-grid-bg-v2 fixed inset-0 -z-10" aria-hidden="true"></div>
    @endif

    @if (theme('glow_effects', true))
    <div class="astra-aurora" aria-hidden="true">
        <span></span>
        <span></span>
        <span></span>
    </div>
    @endif

    @if (theme('announcement_enabled', false))
    <div class="fixed top-0 left-0 right-0 z-30 h-9 flex items-center justify-center bg-primary text-white text-sm font-medium px-4 truncate">
        @if (theme('announcement_link'))
        <a href="{{ theme('announcement_link') }}" class="hover:underline truncate">{{ theme('announcement_text') }}</a>
        @else
        <span class="truncate">{{ theme('announcement_text') }}</span>
        @endif
    </div>
    @endif

    <x-navigation />
    <div class="w-full flex flex-grow">
        @if (isset($sidebar) && $sidebar)
        <x-navigation.sidebar title="$title" />
        @endif
        <div class="{{ (isset($sidebar) && $sidebar) ? 'md:ml-64 rtl:ml-0 rtl:md:mr-64' : '' }} flex flex-col flex-grow overflow-auto">
            <main class="{{ theme('announcement_enabled', false) ? 'mt-[6.25rem]' : 'mt-16' }} grow">
                {{ $slot }}
            </main>
            <x-notification />
            <x-confirmation />
            <div class="flex">
                <x-navigation.footer />
            </div>
        </div>
        <x-impersonating />
    </div>
    @livewireScriptConfig
    {!! hook('footer') !!}
</body>

</html>
