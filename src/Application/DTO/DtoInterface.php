<?php

namespace App\Application\DTO;

interface DtoInterface
{
    public function isCreateAction(): bool;
    public function isUpdateAction(): bool;
}
