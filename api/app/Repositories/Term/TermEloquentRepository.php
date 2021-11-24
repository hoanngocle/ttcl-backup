<?php

namespace App\Repositories\Term;

use App\Models\Term;
use App\Repositories\Base\BaseEloquentRepository;
use Exception;

class TermEloquentRepository extends BaseEloquentRepository implements TermRepositoryInterface
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Term::class;
    }

    /**
     * Get all Term
     *
     * @param $setId
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListTermBySet($setId)
    {
        try {
            $query = $this->_model
                ->where('set_id', $setId);

            return $query->get();
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }
}
