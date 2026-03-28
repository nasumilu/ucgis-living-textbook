<?php

namespace App\Controller;

use App\Router\LtbRouter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConceptShortcutController extends AbstractController
{

  #[Route('/{concept<(?i:(\w{2,3}-\d{2}-\d{2,3}$))>}', name: "app_concept_shortcut", methods: 'GET')]
  public function gistBokTopics(Request $request, string $concept, LtbRouter $router): Response
  {
    $url = $router->generate('_home', ['pageUrl' => 'concept/'. $concept]);
    $host = preg_replace('/^(https?:\/\/)[^\.\/]+\.(.*)$/', '$1gistbok-ltb.$2', $request->getSchemeAndHttpHost());
    return $this->redirect($host . $url , Response::HTTP_MOVED_PERMANENTLY);
  }

}
