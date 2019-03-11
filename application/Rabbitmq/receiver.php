<?php

require_once '/var/www/html/codeigniter/application/Rabbitmq/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

class Receiver
{
    /*
    name: hello
    type: direct
    passive: false
    durable: true // the exchange will survive server restarts
    auto_delete: false //the exchange won't be deleted once the channel is closed.
     */
    public function receiverMail()
    {   
        $RabbitMQConstantsObj = new RabbitMQConstants();
        
        $connection = new AMQPStreamConnection($RabbitMQConstantsObj->host,$RabbitMQConstantsObj->port,$RabbitMQConstantsObj->username,$RabbitMQConstantsObj->password);
        $channel    = $connection->channel();

        $channel->queue_declare($RabbitMQConstantsObj->queuename, false, false, false, false);
        $email=$RabbitMQConstantsObj->senderEmailID;
        $pass=$RabbitMQConstantsObj->senderPassword;
        $callback = function ($msg) {

            $RabbitMQConstantsObj = new RabbitMQConstants();
            $data = json_decode($msg->body, true);

            // $from       = $data['from'];
            // $from_email = $data['from_email'];
            $to_email   = $data['to_email'];
            $subject    = $data['subject'];
            $message    = $data['message'];
            /**
             * Create the Transport
             */
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername($RabbitMQConstantsObj->senderEmailID)
                ->setPassword($RabbitMQConstantsObj->senderPassword);


    //             $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
    // ->setUsername($RabbitMQConstantsObj->senderEmailID)
    // ->setPassword($RabbitMQConstantsObj->senderPassword);

            /**
             * Create the Mailer using your created Transport
             */
            $mailer = new Swift_Mailer($transport);

            /**
             * Create a message
             */
                 $message = (new Swift_Message($subject))
                ->setFrom($RabbitMQConstantsObj->senderEmailID)
                ->setTo([$to_email])
                ->setBody($message);
            /**
             * Send the message
             */
            $result = $mailer->send($message);
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_consume($RabbitMQConstantsObj->queuename, '', false, false, false, false, $callback);

        $channel->basic_qos(null, 1, null);
        // if (count($channel->callbacks)) {
        //     $channel->wait();
        // }
    }
}
