<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@admin.com')
            ->setPassword($this->passwordHasher->hashPassword($user, 'admin'))
            ->setRoles(['ROLE_ADMIN'])
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user@user.com')
            ->setPassword($this->passwordHasher->hashPassword($user, 'user'))
            ->setActive(true)
            ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($user);

        $manager->flush();
    }

    public function getOrder(): int{
        return 3;
    }
}
