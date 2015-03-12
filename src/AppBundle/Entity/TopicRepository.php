<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TopicRepository extends EntityRepository {

  public function findAllOrderedbyDate() {

    // return $this->getEntityManager()

  }
}