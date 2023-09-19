<?php

namespace App\Tests;

use App\Entity\Post;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PostTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $post = new Post();
        $post->setName('name')
            ->setDescription('description')
            ->setDateAt(new DateTimeImmutable());

        $errors = $container->get('validator')->validate($post);
        $this->assertCount(0, $errors);
    }

    public function testEntityIsNotValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $post = new Post();
        $post->setName('')
            ->setDescription('description')
            ->setDateAt(new DateTimeImmutable());

        $errors = $container->get('validator')->validate($post);
        $this->assertCount(2, $errors);
    }
}
