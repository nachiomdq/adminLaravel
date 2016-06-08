<?php
namespace App\Enums;

use Artisaninweb\Enum\Enum;

class UserType extends Enum {

    const SuperAdmin = 1;
    const Admin = 2;
    const User = 3;
    
}
