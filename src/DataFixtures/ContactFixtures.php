<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setName('John Doe');
        $contact->setEmail('abdellah@gmail.com');
        $contact->setPhone('0606060606');
       
        $manager->persist($contact);
    
        $contact2 = new Contact();
        $contact2->setName('abdo Doe');
        $contact2->setEmail('abdellah@gmail.com');
        $contact2->setPhone('0606060606');
        
        $manager->persist($contact2);
        
        $contact3 = new Contact();
        $contact3->setName('test Doe');
        $contact3->setEmail('abdellah@gmail.com');
        $contact3->setPhone('0606060606');

        $manager->persist($contact3);
        
        $contact4 = new Contact();
        $contact4->setName('test john');
        $contact4->setEmail('abdellah@gmail.com');
        $contact4->setPhone('0606060606');

        $manager->persist($contact4);
    
        $manager->flush();
    }
}

