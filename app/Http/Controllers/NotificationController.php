<?php
namespace App\Http\Controllers;

use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Vonage\Client\Credentials\Basic;

class NotificationController extends Controller
{
    public function sendSmsNotificaition()
    {

        $basic = new Basic(config('nexmo.key'), config('nexmo.secret'));
        $client = new Client($basic);

        $response = $client->sms()->send(
            new SMS("254792009556", "VOYAGE SMS", 'A text message sent using the Nexmo API for testing')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {   
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
