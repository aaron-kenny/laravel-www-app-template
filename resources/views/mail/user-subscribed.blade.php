@component('mail::message')

# User Subscribed
{{ $firstName }} {{ $lastName }} has subscribed to {{ $subscriptionName }}.

{{ Carbon\Carbon::now()->toDayDateTimeString() }}

@endcomponent