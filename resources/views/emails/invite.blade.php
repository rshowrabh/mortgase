@component('mail::message')
# Introduction

<p>Someone has invited you </p>

@component('mail::button', ['url' => route('accept', $invite->token)])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
