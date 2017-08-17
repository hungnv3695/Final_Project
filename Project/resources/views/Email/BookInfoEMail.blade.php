@component('mail::layout')
{{-- Header --}}
@slot('header')
@endslot

{{-- Body --}}
###Kính gửi quý khách hàng, <br>
Cảm ơn quý khách hàng đã sử dụng dịch vụ của khách sạn Ánh Dương. <br>
Chúng tôi xin trân trọng thông báo tới quý khách hàng thông tin chi tiết về đơn đặt phòng của quý khách. <br>

Mã đăng ký:  **RS01**<br>
Người đăng ký: Đặng Công Sơn <br>
CMT: 163299229 <br>
Ngày nhận phòng:2017/07/07 (Thứ Năm)  <br>
Ngày trả phòng:2017/07/10 (Chủ Nhật) <br>
Số đêm: 3 <br>
Số lượng người: 2 <br>
Số lượng phòng: 2 <br>
Ghi chú: <br>

Thông tin chi tiết các loại phòng đã đăng ký <br>
@component('mail::table')
|Stt|Loại phòng|Số lượng|Giá
|:---------:|:---------:|:---------:|:---------:
|1|Double|1|500
| | |Tổng giá:|500$|
@endcomponent

Để thực hiện hủy phòng quý khách vui lòng click vào link bên dưới.<br>
[Canncel Booking](https://www.google.com)

Chúc quý khách có những giây phút thoải mái tại Ánh Dương

<!-- Body here -->
@slot('footer')
E-mail này được gửi tự động từ hệ thống của khách sạn, quý khách vui lòng không trả lời mail này.<br>
Bản quyền thuộc về SonDC
@endslot
@endcomponent