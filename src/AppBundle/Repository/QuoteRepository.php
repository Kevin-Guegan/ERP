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

    public function getStatsQuotePricePerMonthsThisYear() {
        $sql = "
        SELECT
          IFNULL(sum(totalpriceTTC),0) AS TTC, v_months.Name as y
        FROM v_months
        LEFT JOIN quote ON MONTH(quote.createDate) = v_months.id AND YEAR(CreateDate) = YEAR(CURDATE())
        GROUP BY v_months.Id ORDER BY v_months.Id;
        ";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getStatsQuotePricePerMonthsLastYear() {
        $sql = "
        SELECT
          IFNULL(sum(totalpriceTTC),0) AS TTC, v_months.Name as y
        FROM v_months
        LEFT JOIN quote ON MONTH(quote.createDate) = v_months.id AND YEAR(CreateDate) = YEAR(CURDATE()) -1
        GROUP BY v_months.Id ORDER BY v_months.Id;
        ";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}