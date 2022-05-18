<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    //

    public function __construct(){
        parent::_construct();
    }

    public function index(){
        $token = env('TELEGRAM_BOT_TOKEN');
        $api_url = "https://api.telegram.org/bot".$token;
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chat_id = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];

        if(strpos($message, "/start") == 0){
            file_get_contents($api_url."/sendmessage?chat_id=".$chat_id."&text=Selamat datang di Wakaf Salman ChatBot, Apakah ada yang bisa kami bantu? 😊🙏&parse_mode=HTML");
        }


    }
    /*
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
    */



}
