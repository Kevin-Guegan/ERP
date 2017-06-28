<?php
/**
 * Created by PhpStorm.
 * User: A645263
 * Date: 27/06/2017
 * Time: 14:10
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Vat;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadVatData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $em){

        $defaultTVA1 = new Vat();
        $defaultTVA1->setName('5%');
        $defaultTVA1->setRate(5);
        $this->addReference('tva1', $defaultTVA1);

        $defaultTVA2 = new Vat();
        $defaultTVA2->setName('10%');
        $defaultTVA2->setRate(10);
        $this->addReference('tva2', $defaultTVA2);

        $defaultTVA3 = new Vat();
        $defaultTVA3->setName('20%');
        $defaultTVA3->setRate(20);
        $this->addReference('tva3', $defaultTVA3);

        $em->persist($defaultTVA1);
        $em->persist($defaultTVA2);
        $em->persist($defaultTVA3);
        $em->flush();


    }

    public function getOrder()
    {
        return 1;
    }
}