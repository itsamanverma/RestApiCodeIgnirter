<?php
require_once '/var/www/html/codeigniter/application/Rabbitmq/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

include "/var/www/html/codeigniter/application/Rabbitmq/receiver.php";
include "/var/www/html/codeigniter/application/static/RabbitMQConstants.php";

class SendMail
{
/**
 * @method sendEmail()
 * @var connection creates the AMPQSTREAMconnection
 * @return void
 */

    public function sendEmail($toEmail, $subject, $body)
    {
        
        $RabbitMQConstantsObj = new RabbitMQConstants();
        
        $connection = new AMQPStreamConnection($RabbitMQConstantsObj->host,$RabbitMQConstantsObj->port,$RabbitMQConstantsObj->username,$RabbitMQConstantsObj->password);
       //  $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel    = $connection->channel();
        /*
        name: hello
        passive: false
        durable: true // the queue will survive server restarts
        exclusive: false // the queue can be accessed in other channels
        auto_delete: false //the queue won't be deleted once the channel is closed.
         */
        $channel->queue_declare($RabbitMQConstantsObj->queuename, false, false, false, false);
       
            $data = json_encode(array(
            "from"       => $RabbitMQConstantsObj->senderEmailID,
            "from_email" => $RabbitMQConstantsObj->senderEmailID,
            "to_email"   => $toEmail,
            "subject"    => $subject,
            "message"    => $body,
        ));

        $msg = new AMQPMessage($data, array('delivery_mode' => 2));

        $channel->basic_publish($msg, '',$RabbitMQConstantsObj->queuename );
        /**
         * calling the receiver
         */
        $obj = new Receiver();

        $obj->receiverMail();
        $channel->close();
        $connection->close();
        return "sent";
    }
}
