<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Exception;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create or update user
     *
     * @param $params
     * @param null $idUser
     * @return bool
     */
    public function createUser($params)
    {
        $params['password'] = bcrypt($params['password']);
        try {
            $user = $this->userRepository->create($params);
            if ($user) {
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
     * Create or update user
     *
     * @param $params
     * @return bool
     */
    public function updateUser($params)
    {
        $idUser = $params['id'];
        try {
            $user = $this->userRepository->update($idUser, $params);
            if ($user) {
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
     * Get user info after login
     *
     * @return mixed
     */
    public function getCurrentUserInfo()
    {
        return $this->userRepository->find(auth()->user()->id);
    }

    /**
     * Get user details
     *
     * @param $id
     * @return mixed
     */
    public function getUserDetails($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * Get list users
     *
     * @param $params
     * @return mixed
     */
    public function getListUsers($params)
    {
        $sortBy = $params['sort'];
        $perPage = $params['per_page'];
        return $this->userRepository->getAllUsers($sortBy, $perPage);
    }

    /**
     * Delete user
     *
     * @param $id
     * @return mixed
     */
    public function deleteUser($id)
    {
        try {
            $user = $this->userRepository->delete($id);
            if ($user) {
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
     * Change status user
     *
     * @param $id
     * @param $params
     * @return bool
     */
    public function updateStatusUser($id, $params)
    {
        try {
            $user = $this->userRepository->update($id, $params);
            if ($user) {
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
