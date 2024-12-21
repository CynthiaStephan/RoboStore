<?php

namespace App\Repository;

use App\Entity\Robot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Robot>
 */
class RobotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginator)
    {
        parent::__construct($registry, Robot::class);
    }
    /**
     * Paginates the list of robots based on the provided page and limit.
     * This method uses the KnpPaginatorBundle to paginate a query
     * that retrieves data for the "robot" entity.
     * @param int $page  The current page number to display (starting from 1).
     * @param int $limit The number of items to display per page.
     * @return PaginationInterface The paginated list of robots.
     */
    public function paginationRobot(int $page, int $limit): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->createQueryBuilder('r'),
            $page,
            $limit
        );
    }

    
    //    /**
    //     * @return Robot[] Returns an array of Robot o ebjects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Robot
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
