<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Rarity extends Enum
{
    const COMMON    = 1;
    const NORMAL    = 2;
    const RARE      = 3;
    const EPIC      = 4;
    const UNIQUE    = 5;
    const LEGENDARY = 6;
}
