@component('mail::layout')
{{-- Header --}}
@slot('header')
@endslot

{{-- Body --}}
Kính gửi quý khách hàng, <br>
Cảm ơn quý khách hàng đã sử dụng dịch vụ của khách sạn Ánh Dương.
Chúng tôi xin trân trọng thông báo tới quý khách hàng thông tin chi tiết về đơn đặt phòng của quý khách <br>

@component('mail::table')
|Mã đăng ký|Người đăng ký|CMT|Ngày nhận phòng|Ngày trả phòng|Số đêm|Số lượng phòng|Ghi chú
|:---|:-------------|:---------------|:---------------|:--------------|:-----------|:------------|:-------------
|RS01|Đặng Công Sơn|001111111111|2017-07-30|2017-08-10|3|4|
@endcomponent


@component('mail::table')

|Stt|Loại phòng|Số lượng|Giá
|:---------:|:---------:|:---------:|:---------:
|1|Double|1|500
@endcomponent

<br>Tổng giá: 500$ <br>
Để thực hiện hủy phòng quý khách vui lòng click vào link bên dưới.<br>
E-mail này được gửi tự động từ hệ thống của khách sạn, quý khách vui lòng không trả lời mail này.<br>
<!-- Body here -->

@slot('footer')
@endslot
@endcomponent