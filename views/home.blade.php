<div>
    <div class="flex flex-col gap-6">
        <h1 class="sr-only">{{ config('app.name', 'Paymenter') }} — {{ theme('seo_description') }}</h1>
        <div class="astra-spotlight relative w-full overflow-hidden bg-background-secondary py-24 border-b border-neutral" id="astra-hero">
            <div class="container relative animate-astra-in">
                <span class="astra-eyebrow mb-5">
                    <span class="astra-eyebrow-dot"></span>
                    Now deploying instantly
                </span>
                <article class="prose dark:prose-invert max-w-2xl [&_h1]:text-4xl [&_h1]:sm:text-6xl [&_h1]:font-extrabold [&_h1]:tracking-tight [&_h2]:text-4xl [&_h2]:sm:text-6xl [&_h2]:font-extrabold [&_h2]:tracking-tight [&_h2]:astra-shimmer-text [&_p]:text-muted [&_p]:text-lg [&_p]:max-w-xl">
                    {!! Str::markdown(theme('home_page_text', 'Welcome to Paymenter'), [
                    'allow_unsafe_links' => false,
                    'renderer' => [
                    'soft_break' => "<br>"
                    ]]) !!}
                </article>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#services">
                        <x-button.primary class="!w-auto px-6">
                            {{ __('common.button.view_all') }}
                            <span class="astra-btn-arrow">→</span>
                        </x-button.primary>
                    </a>
                    @if (theme('discord_url'))
                    <a href="{{ theme('discord_url') }}" target="_blank" rel="noopener">
                        <x-button.secondary class="!w-auto px-6">Join Discord</x-button.secondary>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div id="services" class="container mt-4 flex flex-col gap-5">

            <h2 class="text-xl font-semibold">Services</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5 mb-4">
                @foreach ($categories as $category)
                <div class="astra-card astra-card-hover astra-card-beam astra-reveal flex flex-col p-4" data-astra-delay="{{ min($loop->iteration, 8) }}">
                    @if(theme('small_images', false))
                    <div class="flex gap-x-3 items-center">
                        @endif
                        @if ($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                            class="aspect-square rounded-xl {{ theme('small_images', false) ? 'w-14 h-fit' : 'w-full object-cover object-center' }}">
                        @endif
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
                            @if ($category->products->count())
                            <span class="text-xs font-semibold px-2 py-1 rounded-full bg-primary/10 text-primary shrink-0">
                                {{ $category->products->count() }} {{ Str::plural('plan', $category->products->count()) }}
                            </span>
                            @endif
                        </div>
                        @if(theme('small_images', false))
                    </div>
                    @endif
                    @if(theme('show_category_description', true))
                    <article class="prose dark:prose-invert mt-2">
                        {!! $category->description !!}
                    </article>
                    @endif
                    <a href="{{ route('category.show', ['category' => $category->slug]) }}" wire:navigate class="mt-auto pt-2">
                        <x-button.primary>
                            {{ __('common.button.view_all') }}
                            <x-ri-arrow-right-fill class="size-5" />
                        </x-button.primary>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        @if (theme('features_enabled', true))
        <div class="container mt-8">
            <h2 class="text-xl font-semibold mb-5 astra-reveal">Why choose us</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $astraFeatureIcons = ['bolt', 'rocket', 'chat', 'shield'];
                @endphp
                @for ($i = 1; $i <= 4; $i++)
                <div class="astra-card astra-card-hover astra-card-beam astra-reveal p-5" data-astra-delay="{{ $i }}">
                    <div class="size-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4">
                        @switch($astraFeatureIcons[$i - 1])
                            @case('bolt')
                                <x-ri-flashlight-fill class="size-5" />
                                @break
                            @case('rocket')
                                <x-ri-rocket-2-fill class="size-5" />
                                @break
                            @case('chat')
                                <x-ri-chat-3-fill class="size-5" />
                                @break
                            @default
                                <x-ri-shield-check-fill class="size-5" />
                        @endswitch
                    </div>
                    <h3 class="font-semibold mb-1">{{ theme('feature_' . $i . '_title') }}</h3>
                    <p class="text-sm text-muted">{{ theme('feature_' . $i . '_text') }}</p>
                </div>
                @endfor
            </div>
        </div>
        @endif

        @if (theme('stats_enabled', true))
        <div class="container mt-12">
            <div class="astra-card astra-reveal grid grid-cols-2 gap-6 p-8 text-center">
                <div>
                    <div class="text-3xl font-bold astra-shimmer-text astra-counter" data-astra-count-to="{{ \App\Models\User::count() }}">{{ \App\Models\User::count() }}</div>
                    <div class="text-sm text-muted mt-1">Customers</div>
                </div>
                <div>
                    <div class="text-3xl font-bold astra-shimmer-text astra-counter" data-astra-count-to="{{ \App\Models\Service::where('status', 'active')->count() }}">{{ \App\Models\Service::where('status', 'active')->count() }}</div>
                    <div class="text-sm text-muted mt-1">Active services</div>
                </div>
            </div>
        </div>
        @endif

        @if (theme('faq_enabled', true))
        <div class="container mt-12 mb-8 max-w-3xl">
            <h2 class="text-xl font-semibold mb-5 astra-reveal">Frequently asked questions</h2>
            <div class="flex flex-col gap-3" x-data="{ open: null }">
                @for ($i = 1; $i <= 4; $i++)
                    @if (theme('faq_' . $i . '_q'))
                    <div class="astra-card astra-reveal overflow-hidden" data-astra-delay="{{ $i }}">
                        <button type="button" class="w-full flex items-center justify-between gap-4 p-4 text-left font-medium"
                            @click="open = open === {{ $i }} ? null : {{ $i }}">
                            <span>{{ theme('faq_' . $i . '_q') }}</span>
                            <x-ri-add-line class="size-5 shrink-0 transition-transform duration-300" x-bind:class="open === {{ $i }} ? 'rotate-45' : ''" />
                        </button>
                        <div x-show="open === {{ $i }}"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="px-4 pb-4 text-sm text-muted">
                            {{ theme('faq_' . $i . '_a') }}
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>
        @endif
    </div>
    {!! hook('pages.home') !!}
</div>
