<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class EmployeeController extends AbstractController
{
   #[Route('/api/employee', name: 'add_employee', methods:['POST'])]
    public function newEmployee(Request $request, SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $employee = $serializer->deserialize($request->getContent(), Employee::class, 'json');
        $em->persist($employee);
        $em->flush();
        $jsonResponse = $serializer->serialize($employee, 'json');
        return new JsonResponse($jsonResponse, Response::HTTP_CREATED, [], true);
    }
    #[Route('/api/getEmployees', name: 'get_employees', methods:['GET'])]
    public function getEmployees(EmployeeRepository $employeeRepository, SerializerInterface $serializer)
    {
        $employeeList = $employeeRepository->findAll();
        $jsonEmployeeList = $serializer->serialize($employeeList, 'json', ['groups' => 'getEmployee']);
        return new JsonResponse($jsonEmployeeList, Response::HTTP_OK, [], true);
    }
    #[Route('api/employee/{id}', name: 'edit_employee', methods:['PUT'])]
    public function editEmployee(int $id, Request $request, EmployeeRepository $employeeRepository, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $employee = $employeeRepository->find($id);
        if (!$employee) {
            return new JsonResponse(['error' => 'Employee not found'], Response::HTTP_NOT_FOUND);
        }
        $content = $request->toArray();
        $employee->setName($content['name']);
        $employee->setFirtName($content['firstName']);
        $employee->setPhone($content['phone']);
        $employee->setEmail($content['email']);
        $employee->setService($content['service']);
        $employee->setSite($content['site']);
        $em->flush();
        $jsonEmployee = $serializer->serialize($employee, 'json');
        return new JsonResponse($jsonEmployee, Response::HTTP_OK, [], true);
    }

    #[Route('api/employee/{id}', name: 'delete_employee', methods:['DELETE'])]
    public function deleteEmployee(int $id, EmployeeRepository $employeeRepository, EntityManagerInterface $em)
    {
        $employee = $employeeRepository->find($id);
        $em->remove($employee);
        $em->flush();

        return new JsonResponse(['message' => 'Employeedeleted successfully'], Response::HTTP_OK);
    }

    #[Route('api/employee/{id}', name: 'get_employee', methods:['GET'])]
    public function getEmployee(int $id,EmployeeRepository $employeeRepository, SerializerInterface $serializer)
    {
        $employee = $employeeRepository->find($id);
        $jsonemployee = $serializer->serialize($employee, 'json', ['groups' => 'getEmployee']);
        return new JsonResponse($jsonemployee, Response::HTTP_OK, [], true);
    }
}

