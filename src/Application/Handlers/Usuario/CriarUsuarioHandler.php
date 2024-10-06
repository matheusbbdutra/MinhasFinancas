<?php

namespace App\Application\Handlers\Usuario;

use App\Application\DTO\DtoInterface;
use App\Application\DTO\Usuario\UsuarioDTO;
use App\Application\Handlers\AbstractHandler;
use App\Domain\Usuario\Services\UsuarioService;

class CriarUsuarioHandler extends AbstractHandler
{
    public function __construct(private readonly UsuarioService $usuarioService)
    {
    }
    
    public function handle(DtoInterface $dto): ?string
    {
        if ($dto instanceof UsuarioDTO) {
            if ($dto->isCreateAction()) {
                return $this->handleCriarUsuario($dto);
            } elseif ($dto->isUpdateAction()) {
//                return $this->handleAtualizarUsuario($dto);
            }
        } 
        
        return parent::handle($dto);
    }

    private function handleCriarUsuario(UsuarioDTO $dto): string
    {
        $usuario = $this->usuarioService->criarUsuario($dto);
        return "Usuário criado com sucesso: " . $usuario->getNome();
    }

//    private function handleAtualizarUsuario(UsuarioDTO $dto): string
//    {
//        $usuario = $this->usuarioService->atualizarUsuario($dto);
//        return "Usuário atualizado com sucesso: " . $usuario->getNome();
//    }
}
