<?php

namespace App\Controller;

use App\Entity\Service;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ServiceController extends AbstractController
{
    #[Route('/api/service', name: 'add_service', methods:['POST'])]
    public function newService(Request $request, SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $service = $serializer->deserialize($request->getContent(), Service::class, 'json');
        $em->persist($service);
        $em->flush();
        $jsonResponse = $serializer->serialize($service, 'json', ['groups' => "getService"]);
        return new JsonResponse($jsonResponse, Response::HTTP_CREATED, [], true);
    }
    #[Route('/api/getServices', name: 'get_services', methods:['GET'])]
    public function getServices(ServiceRepository $serviceRepository, SerializerInterface $serializer)
    {
        $serviceList = $serviceRepository->findAll();
        $jsonServiceList = $serializer->serialize($serviceList, 'json', ['groups' => "getService"]);
        return new JsonResponse($jsonServiceList, Response::HTTP_OK, [], true);
    }
    #[Route('api/service/{id}', name: 'edit_service', methods:['PUT'])]
    public function editService(int $id, Request $request, ServiceRepository $serviceRepository, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $service = $serviceRepository->find($id);
        if (!$service) {
            return new JsonResponse(['error' => 'service not found'], Response::HTTP_NOT_FOUND);
        }
        $content = $request->toArray();
        $service->setName($content['name']);
        $em->flush();
        $jsonService = $serializer->serialize($service, 'json', ['groups' => "getService"]);
        return new JsonResponse($jsonService, Response::HTTP_OK, [], true);
    }

    #[Route('api/service/{id}', name: 'delete_service', methods:['DELETE'])]
    public function deleteService(int $id, ServiceRepository $serviceRepository, EntityManagerInterface $em)
    {
        $service = $serviceRepository->find($id);
        $em->remove($service);
        $em->flush();

        return new JsonResponse(['message' => 'Service deleted successfully'], Response::HTTP_OK);
    }

    #[Route('api/service/{id}', name: 'get_service', methods:['GET'])]
    public function getService(int $id,ServiceRepository $serviceRepository, SerializerInterface $serializer)
    {
        $service = $serviceRepository->find($id);
        $jsonService = $serializer->serialize($service, 'json', ['groups' => "getService"]);
        return new JsonResponse($jsonService, Response::HTTP_OK, [], true);
    }
}
