<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number')]
    public function number(): Response
    {
        return $this->render('lucky/number.html.twig', [
            'number' => random_int(0, 100),
        ]);
    }

    #[Route('/lucky/number/{max}')]
    public function numberMax(int $max, LoggerInterface $logger): Response
    {
        $logger->info('We are logging!');
        $logger->critical('foobar');

        return $this->render('lucky/number.html.twig', [
            'number' => random_int(0, $max),
        ]);
    }
}