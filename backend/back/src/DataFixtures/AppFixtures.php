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

        $firstNames = ["Jean", "Jeanne", "Jacques"];
        $names = ["Jean", "Dupont", "Duchemin"];
        $phones = ["0555555559", "0555555558", "0555555557"];
        $emails = ["jean.jean@boite.fr", "jeanne.dupont@site.fr", "jacques.duchemin@boite.fr"];
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
