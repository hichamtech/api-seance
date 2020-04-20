<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;

class JWTDecodedListener
{
    /**
     * @param JWTDecodedEvent $event
     *
     * @return void
     */
    public function onJWTDecoded(JWTDecodedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();



        $payload = $event->getPayload();

        if (!isset($payload['ip']) || $payload['ip'] !== $request->getClientIp()) {
            $event->markAsInvalid();
        }

        $user = $this->userRepository->findOneByUsername($payload['username']);
        $payload['custom_user_data'] = $user->getCustomUserInformations();
        $event->setPayload($user); // Don't forget to regive the payload for next event / step


    }
}
