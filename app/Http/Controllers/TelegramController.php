<?php

namespace App\Http\Controllers;

use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\{Request, JsonResponse};

class TelegramController extends Controller
{
    public function ping()
    {
        dd('PONG');
    }

    /**
     * Set webhook.
     *
     * @return JsonResponse
     */
    public function setWebhook(): JsonResponse
    {
        $responseData = Telegram::setWebhook([
            'url' => env('TELEGRAM_WEBHOOK_URL'),
        ]);

        return response()->json($responseData);
    }

    /**
     * Remove webhook.
     *
     * @return JsonResponse
     */
    public function removeWebhook(): JsonResponse
    {
        $responseData = Telegram::removeWebhook();

        return response()->json($responseData);
    }

    public function webhook(Request $request)
    {
        $update = Telegram::commandsHandler(true);

        // TODO test handler

        logger()->info(json_encode($update));

        // Commands handler method returns an Update object.
        // So you can further process $update object
        // to however you want.

        return 'ok';

//        $message = $request->input('message');
    }

    public function sendMessage()
    {
        $response = Telegram::sendMessage([
            'chat_id' => 'CHAT_ID',
            'text' => 'Hello World'
        ]);

        $messageId = $response->getMessageId();

        logger()->info(json_encode("sendMessage: message id - {$messageId}"));

        // TODO test sending
    }

    public function forwardMessage()
    {
        $response = Telegram::forwardMessage([
            'chat_id' => 'CHAT_ID',
            'from_chat_id' => 'FROM_CHAT_ID',
            'message_id' => 'MESSAGE_ID'
        ]);

        $messageId = $response->getMessageId();

        logger()->info(json_encode("forwardMessage: message id - {$messageId}"));

        // TODO test forwarding
    }
}
