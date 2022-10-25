<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheController extends AbstractController
{
    #[Route('/fiche', name: 'app_fiche')]
    public function index(Request $request): Response
    {
        $characterId = $request->query->get('id');
        $apiKey = '001ac6c73378bbfff488a36141458af2';
        $hash = '72e5ed53d1398abb831c3ceec263f18b';
        $timestamp = 'thesoer';
        $json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters/'.$characterId.'?ts='.$timestamp.'&apikey='.$apiKey.'&hash='.$hash.'');
        $result = json_decode($json, true);
        //die(var_dump($result['data']['results'][0]['comics']));
        return $this->render('fiche/fiche.html.twig', [
            'fiche_character' => $result['data']['results'],
        ]);
    }
}
