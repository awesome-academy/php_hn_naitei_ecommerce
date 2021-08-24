<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('auth.home') }}</a></li>
                <li class="item-link"><span>{{ __('auth.register') }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <x-jet-validation-errors class="mb-4" />
                            <form class="form-stl" action="{{ route('register') }}" name="frm-login" method="POST" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">{{ __('auth.register_title') }}</h3>
                                    <h4 class="form-subtitle">{{ __('auth.personal_info') }}</h4>
                                </fieldset>									
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">{{ __('auth.name') }}*</label>
                                    <input type="text" id="frm-reg-lname" name="name" placeholder="{{ __('auth.name') }}*" required autofocus autocomplete="name" :value="name">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">{{ __('auth.email') }}*</label>
                                    <input type="email" id="frm-reg-email" name="email" placeholder="{{ __('auth.email_placeholder') }}" :value="email">
                                </fieldset>
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">{{ __('auth.login_info') }}</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">{{ __('auth.password') }} *</label>
                                    <input type="password" id="frm-reg-pass" name="password" placeholder="{{ __('auth.password') }}" required autocomplete="new-password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="frm-reg-cfpass">{{ __('auth.confirm_password') }} *</label>
                                    <input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="{{ __('auth.confirm_password') }}" required autocomplete="new-password">
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="{{ __('auth.register') }}" name="register">
                            </form>
                        </div>											
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

    </main>
</x-guest-layout>
