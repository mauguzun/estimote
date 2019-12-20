<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BeaconRepository extends EntityRepository
{

    /**
     * @param \DateTime $start
     * @param \DateTime $stop
     * @param string $deviceId
     * @return mixed
     */
    public function reportQuery(\DateTime $start, \DateTime $stop, string $deviceId)
    {
        $qb = $this->createQueryBuilder('dg');

        $d = $this->createQueryBuilder('u')
            ->select(
                'MAX(u.enqueuedAt) AS stop,
                MIN(u.enqueuedAt) as start, 
                u.lat as lat,
                u.long as lng,
                s.name as name,
                s.id as id ,
                a.aircraft as air,
                a.added as added 
                ')
            ->where('u.speed = :speed')
            ->setParameter('speed', 0)
            ->andWhere('u.deviceIdentifier = :device_identifier')
            ->setParameter('device_identifier', $deviceId)
            ->andWhere('u.enqueuedAt < :stop')
            ->andWhere('u.enqueuedAt > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->leftJoin('App\Entity\Stand', 's',
                \Doctrine\ORM\Query\Expr\Join::WITH, 'u.lat = s.latitude and u.long = s.longitude')
            ->leftJoin('App\Entity\Aircraft', 'a',
                \Doctrine\ORM\Query\Expr\Join::WITH, "u.deviceIdentifier = a.device
                  ")
            ->groupBy('a.aircraft,u.lat,u.long,s.name,s.id,a.added ')
            ->having('added > MIN(u.enqueuedAt) and added < MAX(u.enqueuedAt)')
            ->orderBy('a.added')
            ->getQuery()->getResult();

        return $d;
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $stop
     * @param string $deviceId
     * @return mixed
     */
    public function steps(\DateTime $start, \DateTime $stop, string $deviceId)
    {
        $step = $this->createQueryBuilder('u')
            ->select('u.lat as lat ,u.long as lng ,u.speed as speed ,u.added as added ')
            ->where('u.deviceIdentifier = :device_identifier')
            ->setParameter('device_identifier', $deviceId)
            ->andWhere('u.enqueuedAt < :stop')
            ->andWhere('u.enqueuedAt > :start')
            ->setParameter('start', $start)
            ->setParameter('stop', $stop)
            ->getQuery()->getResult();


        foreach ($step as &$value) {
            $value['lat'] = (float)$value['lat'];
            $value['lng'] = (float)$value['lng'];
        }
        return $step;

    }
}