{!! $body !!}
<x-mail::message>
# Item found
 
Your item has been found!
 
<p>you can contact: {{ $finderEmail }} to get your item back</p>
{{-- <x-mail::button >
View Item
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>