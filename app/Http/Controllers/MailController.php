<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use stdClass;

class MailController extends Controller
{

    private $param =  [
        'view' => 'front.emails.contact',
        'data' => [
            'subject' => 'Mail Subject',
            'from'     =>  'from@email.com',
            'sender' =>  'Shams Pathan',
            'to'          =>  'suspathan@gmail.com'
        ],
    ];

    public function __construct($param = null)
    {
        if ($param) {
            $this->reset($param);
        } else {
            $this->reset(json_encode($this->param));
        }
    }

    private function reset($param)
    {

        if (!$param) return false;

        $param = json_decode($param);

        $mail = $param->data ?? null;
        $view = $param->view ?? null;

        if (!$mail || !$view) return false;

        $this->mail =  new stdClass();
        $this->mail->to             = $mail->to ?? 'suspathan@gmail.com';
        $this->mail->from           = $mail->from ?? 'nomail@example.com';
        $this->mail->sender         = $mail->sender ?? 'No Name';
        $this->mail->subject        = $mail->subject ?? 'Your adams';
        $this->mail->view           = $view;
    }

    public function sendPasswordReset(array $param = null)
    {
        if ($param['email']) $this->mail->to = $param['email'];

        $this->send($param);
        return true;
    }

    public function send($param)
    {
        // dd($this->mail->subject);
        Mail::send('front.emails.contact', $param, function ($mail) use ($param) {
            $mail->from($this->mail->from, $this->mail->sender)
                ->to((string)$this->mail->to)
                ->subject("contact");
        });
        return true;
    }

    public function sendOrderMail($param)
    {
        Mail::send('front.emails.order', $param, function ($mail) use ($param) {
            $mail->from($this->mail->from, $this->mail->sender)
                ->to((string)$this->mail->to)
                ->subject(((string)$param['subject']));
        });
        return true;
    }

    public function contactMail($data)
    {
        $data = (array)$data;

        $this->send($data);
    }

    public function orderMail($data)
    {
        $data = (array)$data;
        $data['msg'] = "We will notify you after we have confirmed your order.";
        $data['subject'] = "Thank you for your order...";

        $this->sendOrderMail($data);
    }

    public function orderAccepted($data)
    {
        $data = (array)$data;
        $data['msg'] = "You are getting this notification because we preccessed your order and we found that we are ready to deliver your order.<br/>You will get your products soon...";
        $data['subject'] = "Your Order Is Accepted";
        
        $this->sendOrderMail($data);
    }

    public function orderCancelled($data)
    {
        $data = (array)$data;
        $data['msg'] = "We are sorry to inform you that we just cancelled your order you made with our company.There are some issues with that order.Please contact with us for further information...";
        $data['subject'] = "Upss!! Your Order Is Cancelled";
        
        $this->sendOrderMail($data);
    }

    public function orderDelivered($data)
    {
        $data = (array)$data;
        $data['msg'] = "We noticed that you made an order and we successfully delivered it to you.We are very glad to serve you.Please stay with us and make us serve you in future.If you have any complain or suggession then please feel free to conact with us.";
        $data['subject'] = "Thank you for being with us";
        
        $this->sendOrderMail($data);
    }

}
