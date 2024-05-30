<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="Nombre" :value="__('Nombre')" />
            <x-text-input id="Nombre" name="Nombre" type="text" class="mt-1 block w-full" :value="old('Nombre', $user->Nombre)" required autofocus autocomplete="Nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('Nombre')" />
        </div>
        <div>
            <x-input-label for="Apellido" :value="__('Apellido')" />
            <x-text-input id="Apellido" name="Apellido" type="text" class="mt-1 block w-full" :value="old('Apellido', $user->Apellido)" required autofocus autocomplete="Apellido" />
            <x-input-error class="mt-2" :messages="$errors->get('Apellido')" />
        </div>
        <div>
            <x-input-label for="Calle" :value="__('Calle')" />
            <x-text-input id="Calle" name="Calle" type="text" class="mt-1 block w-full" :value="old('Calle', $user->Calle)" required autofocus autocomplete="Calle" />
            <x-input-error class="mt-2" :messages="$errors->get('Calle')" />
        </div>
        <div>
            <x-input-label for="DNI" :value="__('DNI')" />
            <x-text-input id="DNI" name="DNI" type="text" class="mt-1 block w-full" :value="old('DNI', $user->DNI)" required autofocus autocomplete="DNI" />
            <x-input-error class="mt-2" :messages="$errors->get('DNI')" />
        </div>
        <div>
            <x-input-label for="Usuario" :value="__('Usuario')" />
            <x-text-input id="Usuario" name="Usuario" type="text" class="mt-1 block w-full" :value="old('Usuario', $user->Usuario)" required autofocus autocomplete="Usuario" />
            <x-input-error class="mt-2" :messages="$errors->get('Usuario')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
