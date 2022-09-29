@component('mail::message')

# User Requested Support
From {{ $requesterName }},

{{ $requesterMessage }}

@endcomponent
