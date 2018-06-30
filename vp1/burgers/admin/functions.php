<?php
require_once('../vendor/autoload.php');

function swiftMail(string $theme, $to, string $mess)
{
    $transport = (new Swift_SmtpTransport('ssl://smtp.yandex.ru', 465))
        ->setUsername('kopose@yandex.ru')
        ->setPassword('89516775954')
    ;
    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message($theme))
        ->setFrom(['kopose@yandex.ru'])
        ->setTo($to)
        ->setBody($mess, 'text/html')
    ;
    $result = $mailer->send($message);
    return $result;
}
