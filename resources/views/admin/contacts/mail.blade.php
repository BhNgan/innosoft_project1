@component('mail::message')
# Thông báo liên hệ:

Tên khách hàng: {{ $contact->customer_name }}
<br>
Email khách hàng: {{ $contact->email }}
Nội dung liên hệ: 
<br>
{{ $contact->content }}

{{ config('app.name') }}
@endcomponent