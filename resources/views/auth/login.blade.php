<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">{{ __('auth.home') }}</a></li>
                    <li class="item-link"><span>{{ __('auth.login') }}</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                @if (Session::has('message'))
                                    <p class="mb-4 text-red-600">{{ Session::get('message') }}</p>
                                @else
                                    <x-jet-validation-errors class="mb-4 text-red-600" />
                                @endif
                                <form name="frm-login" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">{{ __('auth.login_title') }}</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-uname">{{ __('auth.email') }}:</label>
                                        <input type="email" id="frm-login-uname" name="email" placeholder="{{ __('auth.email_placeholder') }}" :value="old('email')" required autofocus>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">{{ __('auth.password') }}:</label>
                                        <input type="password" id="frm-login-pass" name="password" placeholder="************" required autocomplete="current-password">
                                    </fieldset>
                                    <input type="submit" class="btn btn-submit" value="{{ __('auth.login') }}" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end main products area-->
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
</x-guest-layout>
