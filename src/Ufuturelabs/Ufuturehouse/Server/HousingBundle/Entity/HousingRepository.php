<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity;

use Doctrine\ORM\EntityRepository;

class HousingRepository extends EntityRepository
{
    /**
     * Search last housing in DB
     *
     * @param $limit int
     * @return array
     */
    public function findLast($limit)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT h FROM HousingBundle:Housing h ORDER BY h.id DESC'
            )
            ->setMaxResults($limit)
            ->getResult();
    }
}