
@component('mail::message')
  Thanks for Joining our communiy

@component('mail::button', ['url' => '/'])
 <i class="fa fa-facebook" aria-hidden="true"></i>
@endcomponent

@component('mail::button', ['url' => '/'])
<i class="fa fa-twitter" aria-hidden="true"></i>
@endcomponent

@component('mail::button', ['url' => '/'])
<i class="fa fa-linkedin" aria-hidden="true"></i>
@endcomponent

@component('mail::button', ['url' => '/'])
<i class="fa fa-whatsapp" aria-hidden="true"></i>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent