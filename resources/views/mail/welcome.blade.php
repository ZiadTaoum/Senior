{!! $body !!}
<x-mail::message>
# Welcome
 
Thanks for your registration
 

{{-- <x-mail::button >
View Item
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>