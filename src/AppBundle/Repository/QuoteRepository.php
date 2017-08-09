<?php
/**
 * Created by PhpStorm.
 * User: kguegan
 * Date: 13/07/2017
 * Time: 19:25
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class QuoteRepository extends EntityRepository
{

    public function getStatsQuotePricePerMonths() {
        $sql = "
        SELECT
        
        FROM
        
        WHERE CreateDate BETWEEN (Year,-1,GETDATE()) AND GetDATE()
        ";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}