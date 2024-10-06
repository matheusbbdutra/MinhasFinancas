<?php

namespace App\Application\DTO\Usuario;

use App\Application\DTO\DtoInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UsuarioDTO implements DtoInterface
{
    public const ACTION_CREATE = 'create';
    public const ACTION_UPDATE = 'update';
    #[SerializedName('nome')]
    private string $nome;
    #[SerializedName('email')]
    private string $email;
    #[SerializedName('senha')]
    private string $senha;
    #[SerializedName('acao')]
    private string $acao;

    public function __construct(string $nome, string $email, string $senha, string $acao = self::ACTION_CREATE)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->acao = $acao;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getAcao(): string
    {
        return $this->acao;
    }

    public function isCreateAction(): bool
    {
        return $this->acao === self::ACTION_CREATE;
    }

    public function isUpdateAction(): bool
    {
        return $this->acao === self::ACTION_UPDATE;
    }
}
