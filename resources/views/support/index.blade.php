@extends('layouts.web')

@section('page-title', 'Get Support')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="INSERT_TITLE">
    <meta property="og:description" content="INSERT_DESCRIPTION">
    <meta property="og:image" content="INSERT_PATH_TO_TWITTER_CARD_IMAGE">
    <meta property="fb:app_id" content="INSERT_FACEBOOK_APP_ID">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="INSERT_TITLE">
    <meta name="twitter:description" content="INSERT_DESCRIPTION">
    <meta name="twitter:image" content="INSERT_PATH_TO_TWITTER_CARD_IMAGE">
@endpush

@section('content')
    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="hero-title">Support</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- CONTACT SUPPORT SECTION -->
    <section class="bg-1 py-12 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2>Having issues?</h2>
                    <p>Please take a moment to browse our frequently asked questions below. If that does not answer your question feel free to contact us.</p>
                    <a class="btn btn-primary" href="{{ route('support.create') }}">Contact support</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT SUPPORT SECTION -->

    <!-- FAQ SECTION -->
    <section class="bg-2 py-12">
        <div class="container">
            <h2 class="text-center mb-5">FAQs</h2>
            <div class="row">
                <div class="col">

                    <div class="accordion" id="faqAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-toggle="collapse" data-target="#howDoIManageMySubscriptions">
                                    How do I manage (cancel, upgrade, or delete) my subscriptions?
                                </button>
                            </h2>
                            <div id="howDoIManageMySubscriptions" class="accordion-collapse collapse" data-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can manage your subscriptions on your <a href="{{ route('subscriptions.index') }}">subscriptions page</a>.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-toggle="collapse" data-target="#howDoIDeleteMyAccount">
                                    How do I delete my account?
                                </button>
                            </h2>
                            <div id="howDoIDeleteMyAccount" class="accordion-collapse collapse" data-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Please <a href="{{ route('support.create') }}">contact support</a> and let them know you would like your account deleted. This will cancel all your subscriptions and delete your payment method. Self service tools for deleting accounts will be implemented in the future.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-toggle="collapse" data-target="#whenWillIBeChargedForMySubscription">
                                    When will I be charged for my subscription?
                                </button>
                            </h2>
                            <div id="whenWillIBeChargedForMySubscription" class="accordion-collapse collapse" data-parent="#faqAccordion">
                                <div class="accordion-body">
                                    If your product included a free trial period when you subscribed, you will be charged at the end of that period unless you cancel your subscription. You can manage your subscriptions and see renewal dates on the <a href="{{ route('subscriptions.index') }}">subscriptions page</a> of the dashboard. If you are currently on a free trial period and you change product plans (e.g. from monthly to yearly) you will maintain your trial period and be charged at the new plan's rate once the trial expires. Some of our products are offered at no cost and these will "renew" as long as you are subscribed, but will never charge you.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-toggle="collapse" data-target="#howSecureIsMyInformation">
                                    How secure is my information?
                                </button>
                            </h2>
                            <div id="howSecureIsMyInformation" class="accordion-collapse collapse" data-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Your information is always encrypted in transit and at rest. We utilize modern world-class cloud infrastructure to ensure there are no weak points in the flow of information. We never sell your information and only share to the extent defined in our privacy policy only to maintain our platforms features and reliability.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-toggle="collapse" data-target="#howDoIManageMyNotifications">
                                    How do I manage my notifications?
                                </button>
                            </h2>
                            <div id="howDoIManageMyNotifications" class="accordion-collapse collapse" data-parent="#faqAccordion">
                                <div class="accordion-body">
                                    While some notifications are purely transactional and based off of direct action taken by our customers, we make some notification preferences available to you. You can find these in each application's settings menu.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END FAQ SECTION -->
@endsection
