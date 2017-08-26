<?php

namespace App\Mail;

use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingInfo  = array();
    public $detailRoomType = array();
    /**
     * BookInfo constructor.
     * @param array $bookingInfo
     */
    public function __construct(array $bookingInfo, array $detailRoomType)
    {
        $this->bookingInfo = $bookingInfo;
        $this->detailRoomType = $detailRoomType;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anhduonghotel.auto.send@gmail.com')
            ->subject('Thông tin đặt phòng ')
            ->markdown('Email.BookInfoEmail');
    }
}
