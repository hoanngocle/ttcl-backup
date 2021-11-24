<?php

namespace App\Repositories\Term;

use App\Repositories\Base\BaseRepositoryInterface;

interface TermRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get all term by set
     * @param $params
     */
    public function getListTermBySet($params);
}
