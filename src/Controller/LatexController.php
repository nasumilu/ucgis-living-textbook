<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/** This is a placeholder to permit URLs to be generated for the LaTeX service. */
#[Route('/latex')]
class LatexController extends AbstractController
{
  #[Route('/render', options: ['expose' => true, 'no_login_wrap' => true], methods: [Request::METHOD_GET])]
  #[IsGranted(AuthenticatedVoter::PUBLIC_ACCESS)]
  public function renderLatex(): Response
  {
    return new Response('Gone', 410);
  }
}
