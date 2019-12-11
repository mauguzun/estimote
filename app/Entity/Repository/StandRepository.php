<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use App\Entity\Apron;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use phpDocumentor\Reflection\Types\Boolean;

class StandRepository extends EntityRepository
{

    /**
     * @param Apron $apron
     * @return bool
     *
     */
    public function findByApron(Apron $apron): bool
    {

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('id', 'id');
        $query = $this->_em->createNativeQuery('SELECT * from stands WHERE arpon_id = ? ', $rsm);
        $query->setParameter(1, $apron->getId());

        return count($query->getResult()) > 0 ? true : false;

    }


}