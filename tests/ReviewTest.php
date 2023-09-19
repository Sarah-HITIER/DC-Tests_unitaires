<?php

namespace App\Tests;

use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReviewTest extends KernelTestCase
{
    public function testNotBlank(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $review = new Review();
        $review->setMark(1)
            ->setText('');

        $errors = $container->get('validator')->validate($review);
        $this->assertCount(2, $errors);
    }

    public function testTextLength(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $review = new Review();
        $review->setMark(1)
            ->setText('text');

        $errors = $container->get('validator')->validate($review);
        $this->assertCount(1, $errors);
    }

    public function testMarkIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $review = new Review();
        $review->setMark(1)
            ->setText('text text');

        $errors = $container->get('validator')->validate($review);
        $this->assertCount(0, $errors);
    }

    public function testReviewIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $review = new Review();
        $review->setMark(1)
            ->setText('text text');

        $errors = $container->get('validator')->validate($review);
        $this->assertCount(0, $errors);
    }
}
