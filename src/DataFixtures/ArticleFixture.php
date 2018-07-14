<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $Article = new Article();
            $Article->setTitle("title n° $i")
                    ->setContent("<p>Article content n°$i</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreateAt(new \DateTime());        
            $manager->persist($Article);


        }
        // $product = new Product();
        $manager->flush();
    }
}
