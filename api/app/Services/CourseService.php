<?php

namespace App\Services;

use App\Repositories\Course\CourseRepositoryInterface;
use Exception;

class CourseService
{
    /**
     * @var CourseRepositoryInterface
     */
    protected $courseRepository;

    /**
     * CourseService constructor.
     * @param CourseRepositoryInterface $courseRepository
     */
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Create Course
     *
     * @param $params
     * @return bool
     */
    public function createCourse($params)
    {
        try {
            $course = $this->courseRepository->create($params);
            if ($course) {
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
     * Update Course
     *
     * @param $params
     * @return bool
     */
    public function updateCourse($params)
    {
        $idCourse = $params['id'];
        try {
            $course = $this->courseRepository->update($idCourse, $params);
            if ($course) {
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
     * Get Course details
     *
     * @param $id
     * @return mixed
     */
    public function getCourseDetails($id)
    {
        return $this->courseRepository->find($id);
    }

    /**
     * Get all courses
     *
     * @return mixed
     */
    public function getListCourses()
    {
        return $this->courseRepository->all();
    }

    /**
     * Delete Course
     *
     * @param $id
     * @return mixed
     */
    public function deleteCourse($id)
    {
        try {
            $course = $this->courseRepository->destroy($id);
            if ($course) {
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
