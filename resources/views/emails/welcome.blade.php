@component('mail::message')
# Introduction

 

@component('mail::button', ['url' => ''])
Welcome to Mortgase Appy
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
