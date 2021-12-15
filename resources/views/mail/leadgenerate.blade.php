@component('mail::message')
    # Hi Admin,

{{ $mailData['nam_e'] }} has been requested to signup on Same Daylivery.

Business Name: {{ $mailData['business_name'] }} <br>
Name: {{ $mailData['nam_e'] }} <br>
Email: {{ $mailData['email'] }} <br>
Phone: {{ $mailData['phone'] }} <br>

Thank you so much <br>
Team Scorng.
@endcomponent
