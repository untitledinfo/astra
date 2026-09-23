<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 py-10">
<div class="astra-gradient-border w-full xl:max-w-[40%] animate-astra-in">
<form class="flex flex-col gap-2 px-6 sm:px-14 pb-10 bg-background-secondary rounded-2xl xl:max-w-[40%] w-full"
    wire:submit="submit" id="reset">
    <div class="flex flex-col items-center my-14">
        <x-logo class="h-10" />
        <h1 class="text-2xl text-center mt-6">{{ __('auth.reset_password') }} </h1>
    </div>
    <x-form.input name="email" type="text" :label="__('general.input.email')" :placeholder="__('general.input.email_placeholder')" wire:model="email" required disabled />

    <x-form.input name="password" type="password" :label="__('general.input.password')" :placeholder="__('general.input.password_placeholder')" wire:model="password" required />
    <x-form.input name="password_confirm" type="password" :label="__('general.input.password_confirmation')" :placeholder="__('general.input.password_confirmation_placeholder')"
        wire:model="password_confirmation" required />

    <x-captcha :form="'reset'" />

    <x-button.primary class="w-full" type="submit">{{ __('auth.reset_password') }}</x-button.primary>
</form>
</div>
</div>
