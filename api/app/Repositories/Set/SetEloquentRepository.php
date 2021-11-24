<?php

namespace App\Repositories\Set;

use App\Models\Set;
use App\Repositories\Base\BaseEloquentRepository;
use Exception;

class SetEloquentRepository extends BaseEloquentRepository implements SetRepositoryInterface
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Set::class;
    }

    /**
     * Get all set
     *
     * @param $sortBy
     * @param $perPage
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllSet($sortBy, $perPage)
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

    /**
     * Get all set
     *
     * @param $courseID
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListSetByCourseID($courseID)
    {
        try {
            $query = $this->_model
                ->where('course_id', $courseID);

            return $query->get();
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }
}
