<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListHeroController extends AbstractController
{
    #[Route('/list/hero', name: 'list_hero')]
    public function index(): Response
    {
        $apiKey = '001ac6c73378bbfff488a36141458af2';
        $hash = '72e5ed53d1398abb831c3ceec263f18b';
        $timestamp = 'thesoer';
        $json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?ts='.$timestamp.'&apikey='.$apiKey.'&hash='.$hash.'&limit=100');
        $result = json_decode($json, true);
        return $this->render('list_hero/list.html.twig', [
            'heroesList' =>  $result['data']['results'],
        ]);
    }
}
