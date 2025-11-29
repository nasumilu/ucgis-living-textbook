<?php

namespace App\ConceptPrint\Section;

use App\ConceptPrint\ImageResolver;
use App\Entity\Concept;
use App\Naming\NamingService;
use App\Router\LtbRouter;
use Bobv\LatexBundle\Exception\LatexException;
use Bobv\LatexBundle\Latex\Element\CustomCommand;
use Pandoc\PandocException;
use Symfony\Contracts\Translation\TranslatorInterface;

use function sprintf;

class ConceptSection extends LtbSection
{
  /**
   * Concept constructor.
   *
   * @throws LatexException
   * @throws PandocException
   */
  public function __construct(
    Concept $concept, LtbRouter $router, TranslatorInterface $translator, NamingService $namingService, string $projectDir, ImageResolver $downloader)
  {
    parent::__construct($concept->getName(), $router, $projectDir, $downloader);

    // Add concept data
    $fieldNames = $namingService->get()->concept();
    if ($concept->getDefinition()) {
      $this->addSection($fieldNames->definition(true), $concept->getDefinition()->getText());
    }    
    if ($concept->getIntroduction()->hasData()) {
      $this->addSection($fieldNames->introduction(true), $concept->getIntroduction()->getText());
    }
    if ($concept->getTheoryExplanation()->hasData()) {
      $this->addSection($fieldNames->theoryExplanation(true), $concept->getTheoryExplanation()->getText());
    }
    if ($concept->getHowTo()->hasData()) {
      $this->addSection($fieldNames->howTo(true), $concept->getHowTo()->getText());
    }
    if ($concept->getExamples()->hasData()) {
      $this->addSection($fieldNames->examples(true), $concept->getExamples()->getText());
    }

    // External resources
    $reference = $concept->getExternalResources();
    if ($reference->count() > 0) {

      $html = $reference->reduce(fn ($prev, $resource) => $prev . '<p><a href="' . $resource->getUrl() . '">' . $resource->getTitle() . '</a></p>');
      $this->addSection($translator->trans("concept.external-resources"), $html);
    }

    // Undo sloppy
    $this->addElement(new CustomCommand('\\fussy'));
  }
}
