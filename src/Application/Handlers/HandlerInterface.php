<?php

namespace App\Application\Handlers;

use App\Application\DTO\DtoInterface;

interface HandlerInterface
{
    public function setNext(AbstractHandler $handler): HandlerInterface;
    public function handle(DtoInterface $dto): ?string;
}
