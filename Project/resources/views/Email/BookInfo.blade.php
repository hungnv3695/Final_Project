@component('mail::layout')
{{-- Header --}}
@slot('header')
@endslot

{{-- Body --}}
Cảm ơn quý khách đã sử dụng dịch vụ của khách sạn chúng tôi. <br>
Dưới đây là thông tin đặt phòng của quý khách <br>

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent
Thanks,<br>
<!-- Body here -->

@slot('footer')
@endslot
@endcomponent