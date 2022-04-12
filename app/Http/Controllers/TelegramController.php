<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    //
    use RequestTrait;
    use MakeComponents;

    public function webhook()
    {
        return $this->apiRequest('setWebhook', [
            'url' => url(route('webhook')),
        ]) ? ['sukses'] : ['ada suatu kesalahan'];
    }

    public function index()
    {
        $result = json_decode(file_get_contents('php://input'));
        $action = $result->message->text;
        $userId = $result->message->from->id;
        if($action == '/start'){
            $text = "Selamat datang di Wakaf Salman, silakan memilih menu yang dikehendaki.. 🙏😊";
            $option = [
                ['Ingin Berwakaf','Tentang Wakaf Salman','Identitas Diri']
            ];
            $this->apiRequest('sendMessage', [
                'chat_id'       => $userId,
                'text'          => $text,
                'reply_markup'  => $this->keyboardBtn($option)
            ]);
        }
    }

}
