<?php

namespace App\DataFixtures;

use App\Entity\User as EntityUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class User extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $user = new EntityUser();
            $password = $this->hasher->hashPassword($user, 'password' . $i);

            $user->setEmail('email' . $i . '@example.com')
                ->setName('user' . $i)
                ->setMark(2)
                ->setPassword($password)
                ->setRoles(['ROLE_ADMIN']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
