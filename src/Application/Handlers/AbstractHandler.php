<?php

namespace App\Application\Handlers;

use App\Application\DTO\DtoInterface;

class AbstractHandler implements HandlerInterface
{
    private ?HandlerInterface $nextHandler = null;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(DtoInterface $dto): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($dto);
        }

        return null;
    }
}
