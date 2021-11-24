<?php

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\Base\BaseEloquentRepository;
use Exception;

class CourseEloquentRepository extends BaseEloquentRepository implements CourseRepositoryInterface
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Course::class;
    }

    /**
     * Get all Course
     *
     * @param $sortBy
     * @param $perPage
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllCourse($sortBy, $perPage)
    {
        try {
            $query = $this->_model
                ->orderBy($sortBy, 'ASC')
                ->paginate($perPage);

            return $query;
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }
}
