<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">{{ __('checkout.home') }}</a></li>
                <li class="item-link"><span>{{ __('checkout.login') }}</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder()">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">{{ __('checkout.bill') }}</h3>
                        <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">{{ __('checkout.fname') }}<span>*</span></label>
                                <input type="text" name="fname" value="" placeholder="{{ __('checkout.placeholder_fname') }}" wire:model="firstname">
                                @error('firstname') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">{{ __('checkout.lname') }}<span>*</span></label>
                                <input type="text" name="lname" value="" placeholder="{{ __('checkout.placeholder_lname') }}" wire:model="lastname">
                                @error('lastname') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">{{ __('checkout.email') }}</label>
                                <input type="email" name="email" value="" placeholder="{{ __('checkout.placeholder_email') }}" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">{{ __('checkout.number') }}<span>*</span></label>
                                <input type="number" name="phone" value="" placeholder="{{ __('checkout.placeholder_number') }}" wire:model="mobile">
                                @error('mobile') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">{{ __('checkout.line1') }}</label>
                                <input type="text" name="add" value="" placeholder="{{ __('checkout.placeholder_line') }}" wire:model="line1">
                                @error('line1') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">{{ __('checkout.line2') }}</label>
                                <input type="text" name="add" value="" placeholder="{{ __('checkout.placeholder_line') }}" wire:model="line2">
                                @error('line2') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">{{ __('checkout.country') }}<span>*</span></label>
                                <input type="text" name="country" value="" placeholder="{{ __('checkout.placeholder_country') }}" wire:model="country">
                                @error('country') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">{{ __('checkout.province') }}<span>*</span></label>
                                <input type="text" name="province" value="" placeholder="{{ __('checkout.province') }}" wire:model="province">
                                @error('province') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">{{ __('checkout.city') }}<span>*</span></label>
                                <input type="text" name="city" value="" placeholder="{{ __('checkout.city') }}" wire:model="city">
                                @error('city') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zip-code">{{ __('checkout.zipcode') }}</label>
                                <input type="number" name="zip-code" value="" placeholder="{{ __('checkout.zipcode') }}" wire:model="zipcode">
                                @error('zipcode') <span class="text-danger">{{ $message }}}</span> @enderror
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">{{ __('checkout.payment') }}</h4>
                    <p class="summary-info"><span class="title">{{ __('checkout.check_money') }}</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="{{ config('constant.cod_payment_method') }}" type="radio" wire:model="paymentmode">
                            <span>{{ __('checkout.cod') }}</span>
                        </label>
                        @error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @if(Session::has('checkout'))
                    <p class="summary-info grand-total">
                        <span>{{ __('checkout.total') }}</span>
                        <span class="grand-total-price">{{ Session::get('checkout')['total'] }}</span>
                    </p>
                    @endif
                    <button type="submit" class="btn btn-medium">{{ __('checkout.submit') }}</button>
                </div>
            </div>
            </form>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
