<?php

namespace App\Repositories\Course;

use App\Repositories\Base\BaseRepositoryInterface;

interface CourseRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get all course
     * @param $sortBy
     * @param $perPage
     */
    public function getAllCourse($sortBy, $perPage);
}
