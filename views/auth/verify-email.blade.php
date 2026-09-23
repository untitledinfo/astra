<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 py-10">
<div class="w-full xl:max-w-[60%] animate-astra-in">
<div
    class="flex flex-col gap-2 px-6 sm:px-14 py-10 bg-background-secondary rounded-2xl border border-neutral xl:max-w-[60%] w-full">
    <h1 class="text-2xl">{{ __('auth.verification.notice') }}</h1>
    <p class="mt-2">{{ __('auth.verification.check_your_email') }}</p>

    <form class="flex flex-col gap-2 mt-4" wire:submit.prevent="submit" id="verify-email">
        <x-captcha :form="'verify-email'" />

        <p class="text-base">{{ __('auth.verification.not_received') }}</p>
        <x-button.primary class="w-full" type="submit">{{ __('auth.verification.request_another') }}</x-button.primary>
    </form>
</div>
</div>
</div>
