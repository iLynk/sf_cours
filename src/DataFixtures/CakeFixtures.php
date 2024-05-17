<?php

namespace App\DataFixtures;

use App\Entity\Cake;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CakeFixtures extends Fixture implements OrderedFixtureInterface
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-creme'))
            ->setName('Pirate Cake')
            ->setImage(strtolower($this->slugger->slug('Pirate Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-chocolat'))
            ->setName('Owl Cake')
            ->setImage(strtolower($this->slugger->slug('Owl Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-divers'))
            ->setName('Bunny Cake')
            ->setImage(strtolower($this->slugger->slug('Bunny Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-creme'))
            ->setName('Butterfly Cake')
            ->setImage(strtolower($this->slugger->slug('Butterfly Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-chocolat'))
            ->setName('Ladybird Cake')
            ->setImage(strtolower($this->slugger->slug('Ladybird Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $cake = (new Cake())
            ->setCategory($this->getReference('cake-category-divers'))
            ->setName('Poison Cake')
            ->setImage(strtolower($this->slugger->slug('Poison Cake')) . '.jpg')
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($cake);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}