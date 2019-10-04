<?php

namespace App\Controller;

use App\Services\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function __invoke(Parser $parser)
    {
        $dir = $this->getParameter('kernel.project_dir');

        return new JsonResponse([
            'json' => $parser->parse(sprintf('%s/src/docs/file.json', $dir)),
            'csv' => $parser->parse(sprintf('%s/src/docs/file.csv', $dir)),
            'xml' => $parser->parse(sprintf('%s/src/docs/file.xml', $dir))
        ]);
    }
}
