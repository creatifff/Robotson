<?php

namespace App\Mail;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Создан заказ в Robotson',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $user = auth()->user();
        $orderReadyDate = Carbon::parse($this->order->created_at)->addDays(7)->locale('ru')->isoFormat('D MMMM YYYY, dddd');
        return new Content(

            view: 'mails.created-order',
            with: [
                'products' => $this->order->products()->get(),
                'total' => $this->order->total,
                'user' => $user,
                'date' => $orderReadyDate,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function build(): array
    {
        return [
            'subject' => 'Ваш заказ оформлен',
            'view' => 'mails.created-order',
            'attach' => public_path('images/robotson-logo.png'),
            'options' => [
                'as' => 'photo.png',
                'mime' => 'image/png'
            ],
        ];
    }
}
