<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class TestSubscriber implements EventSubscriberInterface
{
    public function onKernelView(ViewEvent $event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.view' => 'onKernelView',
        ];
    }
}
