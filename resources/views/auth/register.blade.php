<x-guest-layout>

    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Member Registration</h1>
    <div class="card-container w-50 ">
        <div class="card mb-4 box-shadow mx-auto">
            <div class="card-header">
                <h4 class="text-center">{{$membership->name}}</h4>
            </div>
            <div class="card-body">
                <h1 class="text-center">  ${{$membership->price}}<small class="text-muted"> /
                        yr</small> </h1>
                <span class="description">Membership Valid from {{ date('M d, Y',
            strtotime($membership->start_date)) }} to {{ date('M d, Y', strtotime($membership->end_date)) }}</span>
            </div>

        </div>
    </div>
<hr>
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="tx" id="tx" value="" />
        <div id="register-page-1">
            <span>Please Enter Your Personal Information</span>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name *')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email *')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password *')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__
                ('Confirm Password *')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

                <hr>
            <!-- Address -->
            <div>
                <x-input-label for="address1" :value="__('Address *')" />
                <x-text-input id="address1" class="block mt-1 w-full"
                              type="text" name="address1" :value="old('address1')" required autofocus autocomplete="address1" />
                <x-input-error :messages="$errors->get('address1')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address2" :value="__('Address 2')" />
                <x-text-input id="address2" class="block mt-1 w-full"
                              type="text" name="address2" :value="old
                              ('address2')" autofocus
                              autocomplete="address2" />
                <x-input-error :messages="$errors->get('address2')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="city" :value="__('City *')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="state" :value="__('State *')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="zip" :value="__('Zip *')" />
                <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required autofocus autocomplete="zip" />
                <x-input-error :messages="$errors->get('zip')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Phone *')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>


                <!-- Additional Info -->
            <hr>
            <div class="mt-1">
                <x-input-label for="run_for_office" :value="__('I am interested
                in being a Board Member')" />
                <x-text-input id="run_for_office" class="block mt-1 "
                              type="checkbox" name="run_for_office"
                              :value="old('run_for_office')"  autofocus/>
                <x-input-error :messages="$errors->get('run_for_office')" class="mt-2" />
            </div>

            <div class="mt-1">
                <x-input-label for="volunteer" :value="__('I am interested in
                Volunteering')" />
                <x-text-input id="volunteer" class="block mt-1 "
                              type="checkbox" name="volunteer" :value="old
                              ('volunteer')"  autofocus/>
                <x-input-error :messages="$errors->get('volunteer')" class="mt-2" />
            </div>
        </div>

        <div id="register-page-2" class="">
            <div>Please choose a payment method</div>
            <div id="paypal-button-container" class="panel panel-default"
                 style="margin-top: 60px;">
            </div>
            <div id="msg"></div>
        </div>

        <hr>

        <div class="flex items-center justify-end mt-4">


            {{--<div id="register-next-wrapper">--}}
                    {{--<x-primary-button class="ml-4 register-next">--}}
                        {{--{{ __('Next') }}--}}
                    {{--</x-primary-button>--}}
            {{--</div>--}}

            <div id="register-submit-wrapper" class="">
                {{--<x-secondary-button class="ml-4 register-back">--}}
                    {{--{{ __('Back') }}--}}
                {{--</x-secondary-button>--}}
                <button id="submit-registration" class="btn btn-primary
                ml-4 d-none">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        <div>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>

<script>
    // $('.register-next').on('click', function(){
    //     $('#register-next-wrapper').addClass('d-none');
    //     $('#register-submit-wrapper').removeClass('d-none');
    //
    //     // $('#register-page-1').addClass('d-none');
    //     $('#register-page-2').removeClass('d-none');
    //
    //
    // })

    // $('.register-back').on('click', function(){
    //     $('#register-next-wrapper').removeClass('d-none');
    //     $('#register-submit-wrapper').addClass('d-none');
    //
    //     $('#register-page-1').removeClass('d-none');
    //     $('#register-page-2').addClass('d-none');
    // })

</script>

<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&locale=en_US&disable-funding=paylater"></script>
<script>
    paypal.Buttons({
        // fundingSource: paypal.FUNDING.CARD,
        // All your options here !
        createOrder: (data, actions) => {
            return actions.order.create({
                intent: 'capture',  // capture or authorize
                purchase_units: [{
                    amount: {
                        value: "{{ $membership->price }}"
                    },
                    description: 'CBCA {{ $membership->name }}',
                    invoice_id: "{{ $membership->id }}-" + Date.now(),
                }],
                application_context: {
                    brand_name: 'CBCA',
                    shipping_preference: 'NO_SHIPPING' // if you handle shipping
                }
            });
        },
        // Finalizes the transaction after payer approval
        onApprove: (data) => {
            console.log('Membership purchased !' + data.orderID)
            $('#tx').val(data.orderID);
            $('#msg').html('<strong>Payment Success:</strong></br>Click the ' +
                'Register button to continue.');
            $('#submit-registration').removeClass('d-none');
        },
        // The user closed the window
        onCancel: () => {
            console.log('The user canceled the membership');
        },
        onError: (err) => {
            console.log('Something went wrong', err);
            $('#msg').html('<strong>There was some kind of error:</strong>'
                +err);
        }
    }).render('#paypal-button-container');
</script>
