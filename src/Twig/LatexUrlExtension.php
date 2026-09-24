<?php

namespace App\Twig;

use Override;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

use function preg_replace_callback;
use function sprintf;

/**
 * Handles LaTeX URL fixes for rendering equations in HTML content.
 *
 * This extension modifies LaTeX image URLs by adjusting the path based on
 * the configured base URL for the LaTeX rendering service.
 */
class LatexUrlExtension extends AbstractExtension
{
  public function __construct(
    #[Autowire('%latex_service_base_url%')]
    private readonly string $latexServiceBaseUrl,
  ) {
  }

  #[Override]
  public function getFunctions(): array
  {
    return [
      new TwigFunction('fixLatexUrls', $this->fixLatexUrls(...), ['is_safe' => ['html']]),
    ];
  }

  public function fixLatexUrls(string $html): string
  {
    $pattern = '/<img[^>]+src="(?:https?:\/\/[^\/]+)?\/latex\/render\?content=([^">]+)"[^>]*>/i';

    $baseUrl = $this->latexServiceBaseUrl;
    return preg_replace_callback($pattern, static function ($matches) use ($baseUrl) {
      // $matches[1] is the URL-encoded LaTeX string
      $encodedLatex = $matches[1];
      $localPath    = $baseUrl . '?size=22&equation=' . $encodedLatex;

      return sprintf('<img src="%s" alt="%s">', $localPath, $encodedLatex);
    }, $html);
  }
}
