<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Male()
 * @method static static Female()
 */
final class AccountType extends Enum
{
    const User  = 1;
    const Admin = 99;
}
