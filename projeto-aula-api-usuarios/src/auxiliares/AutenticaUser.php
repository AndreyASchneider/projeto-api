<?php

namespace App\auxiliares;

class AutenticaUser
{
    public function verificaUsuario(string $user, string $pwd): bool
    {
        if (!isset($user) || !isset($pwd)) {
            return false;
        }

        $usuarioTable = \Cake\ORM\TableRegistry::getTableLocator()->get('usuarios');
        $usuario = $usuarioTable->findByEmail($user)->first();

        return $usuario && password_verify($pwd, $usuario->senha);
    }
}
