<?php

namespace App\DataFixtures;

use App\Entity\CakeCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CakeCategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $cakeCategory = (new CakeCategory())
            ->setName('Gâteaux à la crème')
            ->setActive(true);
        $manager->persist($cakeCategory);
        $this->addReference('cake-category-creme', $cakeCategory);

        $cakeCategory = (new CakeCategory())
            ->setName('Gâteaux au chocolat')
            ->setActive(true);
        $manager->persist($cakeCategory);
        $this->addReference('cake-category-chocolat', $cakeCategory);

        $cakeCategory = (new CakeCategory())
            ->setName('Gâteaux divers')
            ->setActive(true);
        $manager->persist($cakeCategory);
        $this->addReference('cake-category-divers', $cakeCategory);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}
