<template x-teleport="body">
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-hidden bg-black/60 backdrop-blur-sm"
        x-show="$store.confirmation.show" 
        x-on:keydown.escape.window="!$store.confirmation.loading && $store.confirmation.close()">
        <!-- Modal inner -->
        <div class="astra-gradient-border w-full mx-2 md:mx-auto max-h-screen mb-8 mt-8 max-w-2xl"
            x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
        <div class="px-6 py-5 text-left bg-background-secondary rounded-2xl overflow-y-auto max-h-[inherit]">
            <div class="flex justify-between items-center">

                <h2 class="text-xl font-bold text-base" x-text="$store.confirmation.title"></h2>
                <button @click="!$store.confirmation.loading && $store.confirmation.close()" 
                        class="text-muted hover:text-base transition-colors rounded-lg p-1 hover:bg-background"
                        :class="{ 'opacity-50 cursor-not-allowed': $store.confirmation.loading }">
                    <x-ri-close-fill class="size-6" />
                </button>
            </div>
            <div class="mt-4 text-muted" x-text="$store.confirmation.message"></div>
            <div class="mt-6 flex-col sm:flex-row flex sm:flex-row-reverse gap-2">
                <x-button.primary type="button" 
                    x-on:click="$store.confirmation.execute()"
                    ::disabled="$store.confirmation.loading">             
                    <!-- Loading spinner -->
                    <template x-if="$store.confirmation.loading">
                        <div class="mr-2">
                            <x-ri-loader-5-fill class="size-4 animate-spin" />
                        </div>
                    </template>
                    
                    <span x-text="$store.confirmation.loading ? 'Loading...' : $store.confirmation.confirmText"></span>
                </x-button.primary>
                
                <x-button.danger type="button" 
                    x-text="$store.confirmation.cancelText" 
                    x-on:click="!$store.confirmation.loading && $store.confirmation.close()"
                    ::disabled="$store.confirmation.loading">
                </x-button.danger>
            </div>
        </div>
        </div>
    </div>
</template>
