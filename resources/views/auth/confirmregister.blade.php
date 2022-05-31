<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('items') }}">
            @csrf

            <!-- Email-->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <p>{{ $request['email'] }}</p>
                <input type="hidden" class="form-control" name="email" id="email" value="{{ $request['email'] }}"/>
                {{-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> --}}
            </div>

            <!-- Password-->
            <div class="form-group">
                <label for="password">パスワード</label>
                {{-- <p>{{ $request['password'] }}</p> --}}
                <p>●●●●●●●●</p>
                <input type="hidden" class="form-control" name="password" id="password" value="{{ $request['password']}}"/>
            </div>

            <!-- Name-->
            <div class="form-group">
                <label for="name">氏名</label>
                <p>{{ $request['name'] }}</p>
                <input type="hidden" class="form-control" name="name" id="name" value="{{ $request['name'] }}"/>
            </div>

            <!-- NickName-->
            <div class="form-group">
                <label for="nick_name">ニックネーム</label>
                <p>{{ $request['nick_name'] }}</p>
                <input type="hidden" class="form-control" name="nick_name" id="nick_name" value="{{ $request['nick_name'] }}"/>
            </div>

            <!-- PhoneNumber-->
            <div class="form-group">
                <label for="phone_number">電話番号</label>
                <p>{{ $request['phone_number'] }}</p>
                <input type="hidden" class="phone_number" name="phone_number" id="phone_number" value="{{ $request['phone_number'] }}"/>
            </div>

            <!-- PostalCode-->
            <div class="form-group">
                <label for="postal_code">郵便番号</label>
                <p>{{ $request['postal_code'] }}</p>
                <input type="hidden" class="form-control" name="postal_code" id="postal_code" value="{{ $request['postal_code'] }}"/>
            </div>

            <!-- Address-->
            <div class="form-group">
                <label for="address">住所</label>
                <p>{{ $request['address'] }}</p>
                <input type="hidden" class="form-control" name="address" id="address" value="{{ $request['address'] }}"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('新規登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
