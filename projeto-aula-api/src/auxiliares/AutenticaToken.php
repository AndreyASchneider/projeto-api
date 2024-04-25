<?php

namespace App\auxiliares;

class AutenticaToken
{
    public function validate(string $token)
    {
        return ($token == 'f0347912e1c9b20f27145f58887c0497');
    }
}
