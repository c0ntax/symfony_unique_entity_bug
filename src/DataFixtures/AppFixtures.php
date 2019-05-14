<?php

namespace App\DataFixtures;

use App\Entity\GrumpyElephant;
use App\Entity\TinyPuppy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tinyPuppy1 = new TinyPuppy();
        $tinyPuppy1->setCode('puppy-1');
        $tinyPuppy1->setName('Puppy 1');
        $manager->persist($tinyPuppy1);

        $tinyPuppy2 = new TinyPuppy();
        $tinyPuppy2->setCode('puppy-2');
        $tinyPuppy2->setName('Puppy 2');
        $manager->persist($tinyPuppy2);

        $grumpyElephant = new GrumpyElephant();
        $grumpyElephant->setCode('grumpy-1');
        $grumpyElephant->setTinyPuppy($tinyPuppy1);
        $manager->persist($grumpyElephant);

        $manager->flush();
    }
}
