<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">{{ __('thankyou.home') }}</a></li>
                <li class="item-link"><span>{{ __('thankyou.tks') }}</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>{{ __('thankyou.tks_for_order') }}</h2>
                <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">{{ __('thankyou.continue_shopping') }}</a>
            </div>
        </div>
    </div><!--end container-->

</main>
