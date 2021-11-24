<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AttributeCode extends Enum
{
    const ATTACK =   'ATK';
    const DEFEND =   'DEF';
    const HEALTH_POINT = 'HP';
    const EVASION = 'EVA';
    const CRITICAL = 'CRIT';

    const STR = 'CRIT';
    const DEX = 'CRIT';
    const FOC = 'CRIT';
    const VIT = 'VICRIT';
}
