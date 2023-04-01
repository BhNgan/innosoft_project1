<?php

namespace App\Mail;

use App\Order;
use App\Http\Web\OrderController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ordermail;
    // public $orderdetail = [];
    // public $product;

    public function __construct(Order $ordermail)
    {
        $this->ordermail = $ordermail;
        // $this->product  = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.username'))->markdown('admin.orders.mail')->subject("Thư xác nhận đơn hàng");
    }
}
