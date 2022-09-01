<?php

namespace infrastructure;

use App\Mail\NoticeMail;
use Illuminate\Support\Facades\Mail;



class SendMailService{

    public function sendMail($symbol){
        dd($symbol);

        if(empty($symbol)){
            
        }else{
            $data['symbol'] = $symbol;
            Mail::to('sahan@speralabs.com')->send(new NoticeMail($data));
            
        }
    }

}