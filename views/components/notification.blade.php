<div x-data>
    <template x-for="(notification, index) in $store.notifications.notifications" :key="notification.id">
        <div x-show="notification.show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 -translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" @click="$store.notifications.removeNotification(notification.id)"
            class="fixed flex items-center gap-3 text-white pl-3 pr-4 py-3 rounded-xl shadow-2xl mb-4 z-50 cursor-pointer max-w-sm backdrop-blur-sm"
            :class="notification.type === 'success' ? 'bg-success' : 'bg-danger'"
            :style="'top: ' + (20 + index * 66) + 'px;left: 50%; transform: translateX(-50%);'">
            <span class="shrink-0 bg-white/20 rounded-full p-1.5">
                <template x-if="notification.type === 'success'">
                    <x-ri-check-line class="size-4" />
                </template>
                <template x-if="notification.type !== 'success'">
                    <x-ri-error-warning-line class="size-4" />
                </template>
            </span>
            <p class="text-sm font-medium" x-text="notification.message"></p>
        </div>
    </template>
</div>
