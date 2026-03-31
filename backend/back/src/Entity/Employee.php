<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getEmployee"])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(["getEmployee"])]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Groups(["getEmployee"])]
    private ?string $firstName = null;

    #[ORM\Column(length: 20)]
    #[Groups(["getEmployee"])]
    private ?string $phone = null;

    #[ORM\Column(length: 50)]
    #[Groups(["getEmployee"])]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[Groups(["getEmployee"])]
    private ?Service $service = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[Groups(["getEmployee"])]
    private ?Site $site = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): static
    {
        $this->site = $site;

        return $this;
    }
}
