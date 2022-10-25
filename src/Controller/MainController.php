<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index()
    {
        $apiKey = '001ac6c73378bbfff488a36141458af2';
        $hash = '72e5ed53d1398abb831c3ceec263f18b';
        $timestamp = 'thesoer';
        $json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?ts='.$timestamp.'&apikey='.$apiKey.'&hash='.$hash.'&limit=10');
        $result = json_decode($json, true);
        $user = $this->getUser();
        return $this->render('main/main.html.twig',[
            'user' => $user,
            'results' => $result['data']['results']
        ]);
    }
}
