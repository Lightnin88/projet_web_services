<?php
namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\EntityRepository;
use AppBundle\Entity\User;


class UserRepository extends EntityRepository
{
    
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u FROM AppBundle:User u ORDER BY u.username ASC'
            )
            ->getResult();
    }
}
?>