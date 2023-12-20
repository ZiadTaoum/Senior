<x-mail::message>
# Item found
 
Your item has been found!
 
<x-mail::button :url="$url">
View Item
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>