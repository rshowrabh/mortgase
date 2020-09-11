@component('mail::message')
# Introduction

<p>Someone has invited you </p>

@component('mail::button', ['url' => $url])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
