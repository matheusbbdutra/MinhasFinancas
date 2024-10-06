<?php

namespace App\Infrastructure\EventListener\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSucessHandler
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        // Pega os dados padrão do evento
        $data = $event->getData();
        $user = $event->getUser();

        // Verifica se o usuário é uma instância da classe UserInterface
        if (!$user instanceof UserInterface) {
            return;
        }

        $data['user'] = [
            'nome' => $user->getNome(),
            'email' => $user->getEmail(),
        ];
        
        $event->setData($data);
    }
}
