<?php

namespace App\EventListener;

use App\Entity\Companion;
use DateTime;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class TourStartedEventListener
{
    #[AsEventListener(event: 'TourStarted')]
    public function onTourStarted($event, $companionEmail): void
    {
        $to = $companionEmail;
        $subject = 'Tour started';
        $message = "A tour has started " . DateTime::now()->format('d-m-Y');
        $headers = "From: st-info@example.com\r\n";
        if (function_exists('mail')) {
            mail($to, $subject, $message, $headers);
        }
    }
}
