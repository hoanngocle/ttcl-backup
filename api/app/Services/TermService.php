<?php

namespace App\Services;

use App\Repositories\Term\TermRepositoryInterface;
use Exception;

class TermService
{
    /**
     * @var TermRepositoryInterface
     */
    protected $termRepository;

    /**
     * TermService constructor.
     * @param TermRepositoryInterface $termRepository
     */
    public function __construct(TermRepositoryInterface $termRepository)
    {
        $this->termRepository = $termRepository;
    }

    /**
     * Create Term
     *
     * @param $params
     * @return bool
     */
    public function createTerm($params)
    {
        try {
            $term = $this->termRepository->create($params);
            if ($term) {
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
     * Update Term
     *
     * @param $params
     * @return bool
     */
    public function updateTerm($params)
    {
        $idTerm = $params['id'];
        try {
            $term = $this->termRepository->update($idTerm, $params);
            if ($term) {
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
     * Get Term details
     *
     * @param $id
     * @return mixed
     */
    public function getTermDetails($id)
    {
        return $this->termRepository->find($id);
    }

    /**
     * Get list terms
     *
     * @param $params
     * @return mixed
     */
    public function getListTerms($params)
    {
        $setId = $params['id'];
        return $this->termRepository->getListTermBySet($setId);
    }

    /**
     * Delete Term
     *
     * @param $id
     * @return mixed
     */
    public function deleteTerm($id)
    {
        try {
            $term = $this->termRepository->destroy($id);
            if ($term) {
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
