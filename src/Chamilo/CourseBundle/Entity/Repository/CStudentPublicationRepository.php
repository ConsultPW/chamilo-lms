<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Entity\Repository;

use Chamilo\CoreBundle\Entity\Course;
use Chamilo\UserBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\Query\Expr\OrderBy;

class CStudentPublicationRepository extends EntityRepository
{
    /**
     * Find all the works registered by a teacher
     * @param User $user
     * @param Course $course
     * @param int $sessionId Optional
     * @param int $groupId Optional
     * @return array
     */
    public function findByTeacher(User $user, Course $course, $sessionId = 0, $groupId = 0)
    {
        $qb = $this->createQueryBuilder('w');
        return $qb
            ->leftJoin(
                'ChamiloCourseBundle:CStudentPublicationAssignment',
                'a',
                Join::WITH,
                'a.publicationId = w.iid AND a.cId = w.cId'
            )
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('w.cId', ':course'),
                    $qb->expr()->eq('w.sessionId', ':session'),
                    $qb->expr()->in('w.active', [0, 1]),
                    $qb->expr()->eq('w.parentId', 0),
                    $qb->expr()->eq('w.postGroupId', ':group'),
                    $qb->expr()->eq('w.userId', ':user')
                )
            )
            ->orderBy('w.sentDate', 'DESC')
            ->setParameters([
                'course' => intval($course->getId()),
                'session' => intval($sessionId),
                'group' => intval($groupId),
                'user' => $user->getId()
            ])
            ->getQuery()
            ->getResult();
    }
}