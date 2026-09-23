<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 py-10">
    <form
        class="astra-gradient-border w-full xl:max-w-[28rem] animate-astra-in"
        wire:submit="submit" id="login">
        <div class="bg-background-secondary rounded-2xl px-6 sm:px-10 pb-10 pt-10 flex flex-col gap-3">
            <div class="flex flex-col items-center mb-4">
                <x-logo class="h-10" />
                <h1 class="text-2xl font-bold text-center mt-6">{{ __('auth.sign_in_title') }}</h1>
                <p class="text-sm text-muted text-center mt-1">Sign in to manage your services</p>
            </div>
            <x-form.input name="email" type="email" :label="__('general.input.email')"
                :placeholder="__('general.input.email_placeholder')" wire:model="email" hideRequiredIndicator required autocomplete="email" />
            <x-form.input name="password" type="password" :label="__('general.input.password')"
                :placeholder="__('general.input.password_placeholder')" required hideRequiredIndicator wire:model="password" autocomplete="current-password" />
            <div class="flex flex-row items-center">
                <x-form.checkbox name="remember" label="Remember me" wire:model="remember" />
                <a class="text-sm text-primary hover:underline ml-auto"
                    href="{{ route('password.request') }}">
                    {{ __('auth.forgot_password') }}
                </a>
            </div>

            <x-captcha :form="'login'" />

            <x-button.primary class="w-full mt-2" type="submit">{{ __('auth.sign_in') }}</x-button.primary>

            {!! hook('auth.login') !!}

            @if (config('settings.oauth_github') || config('settings.oauth_google') || config('settings.oauth_discord'))
            <div class="flex flex-col items-center mt-4">
                <div class="my-5 flex items-center w-full">
                    <span aria-hidden="true" class="h-px grow rounded bg-neutral"></span>
                    <span class="rounded-full px-3 py-1 text-xs font-medium bg-background text-muted border border-neutral">
                        {{ __('auth.or_sign_in_with') }}
                    </span>
                    <span aria-hidden="true" class="h-px grow rounded bg-neutral"></span>
                </div>
                <div class="flex flex-row flex-wrap justify-center mt-2 gap-3 w-full">
                    @foreach (['github', 'google', 'discord'] as $provider)
                    @if (config('settings.oauth_' . $provider))
                    <a href="{{ route('oauth.redirect', $provider) }}"
                        class="flex items-center justify-center px-4 h-10 border border-neutral hover:border-primary/50 bg-background-secondary rounded-xl text-base transition-colors flex-1">
                        <img src="/assets/images/{{ $provider }}-dark.svg" alt="{{ $provider }}"
                            class="size-5 mr-2">
                        {{ __(ucfirst($provider)) }}
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if(!config('settings.registration_disabled', false))
            <div class="text-base text-center rounded-xl py-2 mt-4 text-sm">
                {{ __('auth.dont_have_account') }}
                <a class="text-sm text-primary hover:underline" href="{{ route('register') }}"
                    wire:navigate>
                    {{ __('auth.sign_up') }}
                </a>
            </div>
            @endif
        </div>
    </form>
</div>
