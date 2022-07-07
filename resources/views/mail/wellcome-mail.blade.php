@component('mail::message')
# Introduction

Wellcome {{ $user->name }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
