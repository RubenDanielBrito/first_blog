<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $userRepo = $manager->getRepository(User::class);
        $users = $userRepo->findAll();

        foreach ($users as $user){
            $numberOfPosts = rand(10, 100);

            for ($index = 0; $index <= $numberOfPosts; $index++){
                $post = new Post();
                $post->setTitle($index . $index . "-title");
                $post->setBody("fooBar");
                $post->setUser($user);
                $post->setActive(true);

                $manager->persist($post);
            }

            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
