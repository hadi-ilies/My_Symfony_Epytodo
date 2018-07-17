<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < mt_rand(5, 10); $i++) {
            $Article = new Article();
            $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';                 
            $Article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCreateAt($faker->dateTimeBetween('-6 months'));
                    //$now = new \DateTime();
                    //$diff = $now->diff($Article->setCreateAt);
                    //$days = $diff->days;        
                    //$min = '-' . $days . 'days';
            $manager->persist($Article);
        }
        $manager->flush();
    }
}
