<?php

namespace IIAB\StudentTransferBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OpenEnrollmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OpenEnrollmentRepository extends EntityRepository
{
	/**
	 * @param \DateTime $dateTime
	 *
	 * @return array
	 */
	public function findByDate( \DateTime $dateTime ) {

		return $this->createQueryBuilder( 'o' )
			->where( 'o.beginningDate <= :date' )
			->andWhere( 'o.endingDate >= :date' )
			->setParameter( 'date' , $dateTime )
			->setMaxResults( 1 )
			->getQuery()
			->getResult();
	}
}
