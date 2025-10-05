<?php

namespace App\Exceptions;

use Exception;

class RoleException extends Exception
{
    public function context(): array
    {
        return ['role_id' => $this->RoleId];
    }
}