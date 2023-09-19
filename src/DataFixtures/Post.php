<?php

namespace App\DataFixtures;

use App\Entity\Post as EntityPost;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Post extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $post = new EntityPost();
            $post->setName('post' . $i)
                ->setDescription('description' . $i)
                ->setDateAt(new DateTimeImmutable());

            $manager->persist($post);
        }

        $manager->flush();
    }
}
