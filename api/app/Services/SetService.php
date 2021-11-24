<?php

namespace App\Services;

use App\Repositories\Set\SetRepositoryInterface;
use Exception;

class SetService
{
    /**
     * @var SetRepositoryInterface
     */
    protected $setRepository;

    /**
     * SetService constructor.
     * @param SetRepositoryInterface $SetRepository
     */
    public function __construct(SetRepositoryInterface $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    /**
     * Create Set
     *
     * @param $params
     * @return bool
     */
    public function createSet($params)
    {
        try {
            $set = $this->setRepository->create($params);
            if ($set) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }

    /**
     * Update Set
     *
     * @param $params
     * @return bool
     */
    public function updateSet($params)
    {
        $idSet = $params['id'];
        try {
            $set = $this->setRepository->update($idSet, $params);
            if ($set) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }

    /**
     * Get Set details
     *
     * @param $id
     * @return mixed
     */
    public function getSetDetails($id)
    {
        return $this->setRepository->find($id);
    }

    /**
     * Get list Sets
     *
     * @return mixed
     */
    public function getListSets()
    {
        return $this->setRepository->all();
    }

    /**
     * Get list Sets
     *
     * @param $param
     * @return mixed
     */
    public function getListSetByCourse($param)
    {
        $courseID = $param['id'];
        return $this->setRepository->getListSetByCourseID($courseID);
    }

    /**
     * Delete Set
     *
     * @param $id
     * @return mixed
     */
    public function deleteSet($id)
    {
        try {
            $set = $this->setRepository->destroy($id);
            if ($set) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            logger(__METHOD__ . __LINE__ . $e->getMessage());
            return false;
        }
    }
}
