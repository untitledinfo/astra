<div>
    <div class="flex flex-col gap-6">
        <h1 class="sr-only">{{ config('app.name', 'Paymenter') }} — {{ theme('seo_description') }}</h1>
        <div class="relative w-full overflow-hidden bg-background-secondary py-20 border-b border-neutral">
            @if (theme('glow_effects', true))
            <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 h-72 w-[42rem] rounded-full bg-primary/20 blur-3xl animate-astra-float" aria-hidden="true"></div>
            <div class="pointer-events-none absolute top-1/2 right-0 h-56 w-56 rounded-full bg-secondary/20 blur-3xl animate-astra-float" style="animation-delay:-4s" aria-hidden="true"></div>
            @endif
            <div class="container relative animate-astra-in">
                <article class="prose dark:prose-invert max-w-2xl [&_h1]:text-4xl [&_h1]:sm:text-5xl [&_h1]:font-extrabold [&_h1]:tracking-tight [&_h2]:text-4xl [&_h2]:sm:text-5xl [&_h2]:font-extrabold [&_h2]:tracking-tight [&_h2]:bg-clip-text [&_h2]:text-transparent [&_h2]:bg-gradient-to-r [&_h2]:from-primary [&_h2]:to-secondary [&_p]:text-muted [&_p]:text-lg">
                    {!! Str::markdown(theme('home_page_text', 'Welcome to Paymenter'), [
                    'allow_unsafe_links' => false,
                    'renderer' => [
                    'soft_break' => "<br>"
                    ]]) !!}
                </article>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#services">
                        <x-button.primary class="!w-auto px-6">{{ __('common.button.view_all') }}</x-button.primary>
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
                <div class="astra-card astra-card-hover astra-reveal flex flex-col p-4" data-astra-delay="{{ min($loop->iteration, 8) }}">
                    @if(theme('small_images', false))
                    <div class="flex gap-x-3 items-center">
                        @endif
                        @if ($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                            class="aspect-square rounded-xl {{ theme('small_images', false) ? 'w-14 h-fit' : 'w-full object-cover object-center' }}">
                        @endif
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
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
    </div>
    {!! hook('pages.home') !!}
</div>
