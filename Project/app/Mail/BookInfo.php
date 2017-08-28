<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $reservarion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
