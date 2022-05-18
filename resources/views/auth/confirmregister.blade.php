<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('confirmregister') }}">
            @csrf
            {{-- <input name="email" value="{{ $email }}" />
            <input name="password" value="{{ $password }}" />
            <input name="name" value="{{ $name }}" />
            <input name="nickname" value="{{ $nick_name }}" />
            <input name="postalcode" value="{{ $postal_code }}" />
            <input name="password" value="{{ $password }}" /> --}}

            <!--デフォルトで作成されていたデザインでの確認画面-->
            {{-- <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $email }}" />
                <input type="hidden" class="form-control" name="email" id="email" value="{{ old('$request->email') }}"/>
            </div> --}}

            {{-- <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <p>{{ $request['password'] }}</p>
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                value="{{ $password }}" />
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $name }}" />
            </div>

            <!-- NickName -->
            <div>
                <x-label for="nick_name" :value="__('NickName')" />

                <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nickname" value="{{ $nick_name }}" />
            </div>

            <!-- Postalcode -->
            <div>
                <x-label for="postal_code" :value="__('PostalCode')" />

                <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postalcode" value="{{ $postal_code }}" />
            </div>

            <!-- Address -->
            <div>
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $address }}" />
            </div> --}}


            <!-- Email-->
            <div class="form-group">
                <label for="email">email</label>
                <p>{{ $request['email'] }}</p>
                <input type="hidden" class="form-control" name="email" id="email" value="{{ old('$request->email') }}"/>
            </div>

            <!-- Password-->
            <div class="form-group">
                <label for="password">password</label>
                {{-- <p>{{ $request['password'] }}</p> --}}
                <p>●●●●●●●●</p>
                <input type="hidden" class="form-control" name="password" id="password" value="{{ old('$request->password') }}"/>
            </div>

            <!-- Name-->
            <div class="form-group">
                <label for="name">name</label>
                <p>{{ $request['name'] }}</p>
                <input type="hidden" class="form-control" name="name" id="name" value="{{ old('$request->name') }}"/>
            </div>

            <!-- NickName-->
            <div class="form-group">
                <label for="nick_name">nickname</label>
                <p>{{ $request['nick_name'] }}</p>
                <input type="hidden" class="form-control" name="nick_name" id="nick_name" value="{{ old('$request->nick_name') }}"/>
            </div>

            <!-- PostalCode-->
            <div class="form-group">
                <label for="postal_code">postalcode</label>
                <p>{{ $request['postal_code'] }}</p>
                <input type="hidden" class="form-control" name="postal_code" id="postal_code" value="{{ old('$request->postal_code') }}"/>
            </div>

            <!-- Address-->
            <div class="form-group">
                <label for="address">address</label>
                <p>{{ $request['address'] }}</p>
                <input type="hidden" class="form-control" name="address" id="address" value="{{ old('$request->address') }}"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
