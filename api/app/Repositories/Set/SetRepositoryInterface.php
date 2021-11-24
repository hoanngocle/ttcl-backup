<?php

namespace App\Repositories\Set;

use App\Repositories\Base\BaseRepositoryInterface;

interface SetRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get all by course
     * @param $courseID
     */
    public function getListSetByCourseID($courseID);
}
