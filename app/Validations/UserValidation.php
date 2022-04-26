<?php

namespace App\Validations;

use App\Core\Request;
use App\Core\Validation;
use App\Models\User;

class UserValidation extends Validation
{

    protected function uniqueEmail(string $key): void
    {
        $user = new User();
        $inputUser = $user->getByEmail(Request::param('email'));
        if (!empty($inputUser)) {
            $this->error = false;
        }
    }

}