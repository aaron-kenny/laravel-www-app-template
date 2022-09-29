@component('mail::message')

# User Registered
{{ $firstName }} {{ $lastName }} has registered at INSERT_APP_NAME.

{{ Carbon\Carbon::now()->toDayDateTimeString() }}

@endcomponent
