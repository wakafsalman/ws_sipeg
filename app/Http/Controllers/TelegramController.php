<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    //
    public function __construct()
    {

        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    
    }  

    public function kirim_pesan($id)
    {

        return $this->telegram->sendMessage([
            'chat_id'   =>  $id,
            'text'      =>  'Selamat datang di Wakaf Salman ChatBot, Apakah ada yang bisa kami bantu? 😊🙏'
        ]);

    }

    public function pesan()
    {

        return $this->telegram->getUpdates();

    }

}
