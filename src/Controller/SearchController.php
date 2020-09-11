<?php

namespace App\Controller;

use App\Entity\Album;
use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/search")
 */
class SearchController extends AbstractController
{
    /**
     * @Route("/{artist}", name="search_by_artist", methods={"GET"})
     * @param Request $request

     * @return Response
     */
    public function search(Request $request): Response
    {
        $query = $request->query->get('q', '');

        $albums = $this->getDoctrine()
            ->getRepository(Album::class)
            ->findByArtist($query);

    }
}
