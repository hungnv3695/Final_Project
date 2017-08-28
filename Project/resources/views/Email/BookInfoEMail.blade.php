@component('mail::layout')
{{-- Header --}}
@slot('header')
@endslot

{{-- Body --}}
###Kính gửi quý khách hàng, <br>
Cảm ơn quý khách hàng đã sử dụng dịch vụ của khách sạn Ánh Dương. <br>
Chúng tôi xin thông báo tới quý khách hàng thông tin chi tiết về đơn đặt phòng. <br>

Người đăng ký: {!! $bookingInfo[\App\Http\Common\Constants::GUEST_NAME] !!} <br>
CMT: {!! $bookingInfo[\App\Http\Common\Constants::CMND] !!} <br>
Ngày nhận phòng:{!! $bookingInfo[\App\Http\Common\Constants::CHECK_IN] !!}   <br>
Ngày trả phòng:{!! $bookingInfo[\App\Http\Common\Constants::CHECK_OUT] !!}  <br>
Số đêm: {!! $bookingInfo[\App\Http\Common\Constants::NUMBER_NIGHT] !!} <br>
Số lượng người lớn: {!! $bookingInfo[\App\Http\Common\Constants::ADULT] !!} <br>
Số lượng trẻ em: {!! $bookingInfo[\App\Http\Common\Constants::CHILDREN] !!} <br>
Ghi chú: <br>
Thông tin chi tiết các loại phòng đã đăng ký <br>
@component('mail::table')

|Stt|Loại phòng|Số lượng|Giá
|:---------:|:---------:|:---------:|:---------:
    @for($i=0;$i<sizeof($detailRoomType)-1;$i++)
|{!!  array_get($detailRoomType[$i], \App\Http\Common\Constants::STT) !!}|{!! array_get($detailRoomType[$i], \App\Http\Common\Constants::ROOM_TYPE_NAME) !!}|{!! array_get($detailRoomType[$i], \App\Http\Common\Constants::QUANTITY) !!}|{!! array_get($detailRoomType[$i], \App\Http\Common\Constants::PRICE) !!}
@endfor
| | |Tổng tiền phòng:|{!! $detailRoomType["Total"] !!}|(VNĐ)
| | |VAT(10%):|{!! $detailRoomType["VAT"] !!}|(VNĐ)
| | |Tổng tiền thanh toán:|{!! $detailRoomType["TotalAmount"] !!}|(VNĐ)

@endcomponent

Chúc quý khách có những giây phút thoải mái tại Ánh Dương
<!-- Body here -->
@slot('footer')
E-mail này được gửi tự động từ hệ thống của khách sạn, quý khách vui lòng không trả lời mail này.<br>
@endslot
@endcomponent