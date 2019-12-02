<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use App\Entity\Beacon;
use Doctrine\ORM\EntityRepository;

class BeaconRepository extends EntityRepository
{

    /**
     * @param \DateTime $start
     * @param \DateTime $stop
     * @param int $ts
     * @return mixed
     */
    public  function reportQuery(\DateTime $start,\DateTime $stop ,int $ts){
        return   $this->createQueryBuilder('u')
            ->select(
                'MAX(u.added) AS stop,
                MIN(u.added) as start, 
                u.lat as lat,
                u.long as lng')
            ->where('u.speed = 0')
            ->andWhere('u.ts = :ts')
            ->setParameter('ts',$ts)
            ->andWhere('u.added < :stop')
            ->andWhere('u.added > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->groupBy('u.lat,u.long')
            ->getQuery()->getResult();
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $stop
     * @param int $ts
     * @return mixed
     */
    public  function steps(\DateTime $start,\DateTime $stop ,int $ts){
        return   $this->createQueryBuilder('u')
            ->select('u.lat as lat ,u.long as lng ,u.speed as speed ,u.added as added ')
            ->where('u.ts = :ts')
            ->setParameter('ts',$ts)
            ->andWhere('u.added < :stop')
            ->andWhere('u.added > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->getQuery()->getArrayResult();
    }
}