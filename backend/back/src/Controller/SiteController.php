<?php

namespace App\Controller;

use App\Entity\Site;
use App\Repository\SiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class SiteController extends AbstractController
{
    #[Route('/api/site', name: 'add_site', methods:['POST'])]
    public function newSite(Request $request, SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $site = $serializer->deserialize($request->getContent(), Site::class, 'json');
        $em->persist($site);
        $em->flush();
        $jsonResponse = $serializer->serialize($site, 'json');
        return new JsonResponse($jsonResponse, Response::HTTP_CREATED, [], true);
    }
    #[Route('/api/getSites', name: 'get_sites', methods:['GET'])]
    public function getSites(SiteRepository $siteRepository, SerializerInterface $serializer)
    {
        $siteList = $siteRepository->findAll();
        $jsonSiteList = $serializer->serialize($siteList, 'json', ['groups' => "getSite"]);
        return new JsonResponse($jsonSiteList, Response::HTTP_OK, [], true);
    }
    #[Route('api/site/{id}', name: 'edit_site', methods:['PUT'])]
    public function editSite(int $id, Request $request, SiteRepository $siteRepository, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $site = $siteRepository->find($id);
        if (!$site) {
            return new JsonResponse(['error' => 'site not found'], Response::HTTP_NOT_FOUND);
        }
        $content = $request->toArray();
        $site->setName($content['name']);
        $site->setStatus($content['status']);
        $em->flush();
        $jsonSite = $serializer->serialize($site, 'json', ['groups' => "getSite"]);
        return new JsonResponse($jsonSite, Response::HTTP_OK, [], true);
    }

    #[Route('api/site/{id}', name: 'delete_site', methods:['DELETE'])]
    public function deleteSite(int $id, SiteRepository $siteRepository, EntityManagerInterface $em)
    {
        $site = $siteRepository->find($id);
        $em->remove($site);
        $em->flush();

        return new JsonResponse(['message' => 'Site deleted successfully'], Response::HTTP_OK);
    }

    #[Route('api/site/{id}', name: 'get_site', methods:['GET'])]
    public function getSite(int $id,SiteRepository $siteRepository, SerializerInterface $serializer)
    {
        $site = $siteRepository->find($id);
        $jsonSite = $serializer->serialize($site, 'json', ['groups' => "getSite"]);
        return new JsonResponse($jsonSite, Response::HTTP_OK, [], true);
    }
}
