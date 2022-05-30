<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
        @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('register/confirm') }}">
            @csrf
            <input type="hidden" class="form-control" name="email" id="email" value="{{ $request['email'] }}"/>
            <input type="hidden" class="form-control" name="password" id="password" value="{{ $request['password'] }}"/>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('氏名')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- NickName -->
            <div>
                <x-label for="nick_name" :value="__('ニックネーム')" />

                <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required autofocus />
            </div>

            <!-- PhoneNumber -->
            <div>
                <x-label for="phone_number" :value="__('電話番号')" />
                <p>※ハイフン(-)なしでご入力ください。</p>
                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
            </div>

            <!-- Postalcode -->
            <div>
                <x-label for="postal_code" :value="__('郵便番号')" />
                <p>※ハイフン(-)なしでご入力ください。</p>
                <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autofocus />
            </div>

            <!-- Address -->
            <div>
                <x-label for="address" :value="__('住所')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('既にユーザーIDを保有している方はこちら') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録確認画面へ') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
