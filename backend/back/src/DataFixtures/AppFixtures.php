<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Service;
use App\Entity\Site;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
     private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User;
        $user->setEmail('jeanne.dupont@site.fr');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ADMIN']);
        $manager->persist($user);
        $user = new User;
        $user->setEmail('admin');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ADMIN']);
        $manager->persist($user);
        // $product = new Product();
        // $manager->persist($product);
        $listService = [];
        $services = ["Comptabilité", "Production", "Accueil"];
        foreach ($services as $serviceName) {
            $service = new Service;
            $service->setName($serviceName);
            $manager->persist($service);
            $listService[] = $service;
        }
        $listSite = [];
        $sites = ["Paris" => "Siege Administratif", "Nantes" => "site de Production", "Toulouse" => "site de Production", "Nice" => "site de Production", "Lille" => "site de Production"];
        foreach ($sites as $siteName => $status) {
            $site = new Site;
            $site->setName($siteName);
            $site->setStatus($status);
            $manager->persist($site);
            $listSite[] = $site;
        }

        $firstNames = ["Lucas", "Emma", "Louis", "Léa", "Gabriel", "Chloé", "Arthur", "Inès", "Jules", "Manon", "Hugo", "Camille", "Nathan", "Zoé", "Ethan", "Sarah", "Tom", "Anna", "Noah", "Clara", "Adam", "Louise", "Paul", "Juliette", "Léo", "Eva", "Maxime", "Alice", "Raphaël", "Margaux", "Antoine", "Lucie", "Mathis", "Agathe", "Victor", "Elise", "Alexandre", "Marine", "Théo", "Charlotte", "Baptiste", "Amélie", "Romain", "Amandine", "Sacha", "Océane", "Quentin", "Pauline", "Yanis", "Mélanie"];
        $names = ["Martin", "Bernard", "Dubois", "Thomas", "Robert", "Richard", "Petit", "Durand", "Leroy", "Moreau", "Simon", "Laurent", "Lefebvre", "Michel", "Garcia", "David", "Bertrand", "Roux", "Vincent", "Fournier", "Morel", "Girard", "Andre", "Lefevre", "Mercier", "Dupont", "Lambert", "Bonnet", "Francois", "Martinez", "Legrand", "Garnier", "Faure", "Rousseau", "Blanc", "Guerin", "Muller", "Henry", "Roussel", "Nicolas", "Perrin", "Morin", "Mathieu", "Clement", "Gauthier", "Dumont", "Lopez", "Fontaine", "Chevalier", "Robin"];
        $phones = ["06 01 23 45 67", "07 02 34 56 78", "06 03 45 67 89", "07 04 56 78 90", "06 05 67 89 01", "07 06 78 90 12", "06 07 89 01 23", "07 08 90 12 34", "06 09 01 23 45", "07 10 12 34 56", "06 11 23 45 67", "07 12 34 56 78", "06 13 45 67 89", "07 14 56 78 90", "06 15 67 89 01", "07 16 78 90 12", "06 17 89 01 23", "07 18 90 12 34", "06 19 01 23 45", "07 20 12 34 56", "06 21 23 45 67", "07 22 34 56 78", "06 23 45 67 89", "07 24 56 78 90", "06 25 67 89 01", "07 26 78 90 12", "06 27 89 01 23", "07 28 90 12 34", "06 29 01 23 45", "07 30 12 34 56", "06 31 23 45 67", "07 32 34 56 78", "06 33 45 67 89", "07 34 56 78 90", "06 35 67 89 01", "07 36 78 90 12", "06 37 89 01 23", "07 38 90 12 34", "06 39 01 23 45", "07 40 12 34 56", "06 41 23 45 67", "07 42 34 56 78", "06 43 45 67 89", "07 44 56 78 90", "06 45 67 89 01", "07 46 78 90 12", "06 47 89 01 23", "07 48 90 12 34", "06 49 01 23 45", "07 50 12 34 56"];
        $emails = [];
        foreach ($names as $i => $name) {
            $emails[] = $firstNames[$i] . "." . $name . "@site.fr";
        }
        $services = [0,1,2];
        $sites = [0,1,2,3,4];
        foreach ($firstNames as $i => $firstName) {
            $employee = new Employee;
            $employee->setName($names[$i]);
            $employee->setFirstName($firstNames[$i]);
            $employee->setEmail($emails[$i]);
            $employee->setPhone($phones[$i]);
            $site = $listSite[array_rand($listSite, 1)];
            $employee->setSite($site);
            $service = $listService[array_rand($listService, 1)];
            $employee->setService($service);
            $manager->persist($employee);
        }

        $manager->flush();
    }
}
