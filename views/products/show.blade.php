<div class="container mt-14">
    <div class="astra-card astra-card-beam animate-astra-in flex flex-col @if ($product->image) md:grid grid-cols-2 gap-16 p-6 @else p-6 @endif">
        @if ($product->image)
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
            class="w-full h-96 object-contain object-center rounded-xl border border-neutral">
        @endif
        {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        <div class="flex flex-col">
            @if ($product->stock === 0)
            <span class="text-xs font-semibold me-2 px-2.5 py-1 rounded-full bg-danger/15 text-danger w-fit mb-3">
                {{ __('product.out_of_stock', ['product' => $product->name]) }}
            </span>
            @elseif($product->stock > 0)
            <span class="text-xs font-semibold me-2 px-2.5 py-1 rounded-full bg-success/15 text-success w-fit mb-3">
                {{ __('product.in_stock') }}
            </span>
            @endif
            <div class="flex flex-row justify-between">
                <div>
                    <h2 class="text-3xl font-bold">{{ $product->name }}</h2>
                    <h3 class="text-xl font-bold text-primary">
                        {{ $product->price()->formatted->price }}
                    </h3>
                </div>
                @if ($product->stock !== 0 && $product->price()->available)
                <div>
                    <x-button.secondary>
                        <x-ri-shopping-bag-4-fill class="size-6" />
                    </x-button.secondary>
                </div>
                @endif
            </div>
            <article class="my-4 prose dark:prose-invert">
                {!! $product->description !!}
            </article>

            @if ($product->stock !== 0 && $product->price()->available)
            <a href="{{ route('products.checkout', ['category' => $category, 'product' => $product->slug]) }}"
                wire:navigate>
                <x-button.primary class="!w-auto px-6">{{ __('product.add_to_cart') }} <span class="astra-btn-arrow">→</span></x-button.primary>
            </a>
            @endif
        </div>
    </div>
</div>