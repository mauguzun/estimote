<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use App\Entity\Beacon;
use App\Entity\Stand;
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

        $d=    $this->createQueryBuilder('u')
            ->select(
                'MAX(u.added) AS stop,
                MIN(u.added) as start, 
                u.lat as lat,
                u.long as lng,
                s.name as name,
                s.id as id 
                ')
            ->where('u.speed = 0')
            ->andWhere('u.ts = :ts')
            ->setParameter('ts',$ts)
            ->andWhere('u.added < :stop')
            ->andWhere('u.added > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->leftJoin('App\Entity\Stand', 's',
                \Doctrine\ORM\Query\Expr\Join::WITH, 'u.lat = s.latitude and u.long = s.longitude')

            ->groupBy('u.lat,u.long,s.name,s.id')
            ->getQuery()->getResult();
       return $d;
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $stop
     * @param int $ts
     * @return mixed
     */
    public  function steps(\DateTime $start,\DateTime $stop ,int $ts){
        $step=    $this->createQueryBuilder('u')
            ->select('u.lat as lat ,u.long as lng ,u.speed as speed ,u.added as added ')
            ->where('u.ts = :ts')
            ->setParameter('ts',$ts)
            ->andWhere('u.added < :stop')
            ->andWhere('u.added > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->getQuery()->getResult();


        foreach ($step as &$value){
            $value['lat'] = (float)$value['lat'];
            $value['lng'] =(float) $value['lng'];
        }
        return $step;

    }
}