<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class TourStartedEventListener
{
    #[AsEventListener(event: 'TourStarted')]
    public function onTourStarted($event): void
    {
        
    }
}
