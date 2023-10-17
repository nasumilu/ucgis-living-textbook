<?php

namespace App\Naming\Model;

use Symfony\Component\String\Inflector\InflectorInterface;

class ResolvedConceptNames implements ResolvedNamesInterface
{
  private string $additionalResources;
  private string $definition;
  private string $examples;
  private string $howTo;
  private string $imagePath;
  private string $introduction;
  private string $priorKnowledge;
  private string $selfAssessment;  
  private string $synonyms;
  private string $theoryExplanation;  

  public function __construct(
    string $definition, string $introduction, string $synonyms, string $priorKnowledge, string $theoryExplanation,
    string $howTo, string $examples, string $selfAssessment, string $additionalResources, string $imagePath)
  {
    $this->definition          = strtolower($definition);
    $this->introduction        = strtolower($introduction);
    $this->synonyms            = strtolower($synonyms);
    $this->priorKnowledge      = strtolower($priorKnowledge);
    $this->theoryExplanation   = strtolower($theoryExplanation);
    $this->howTo               = strtolower($howTo);
    $this->examples            = strtolower($examples);
    $this->selfAssessment      = strtolower($selfAssessment);
    $this->additionalResources = strtolower($additionalResources);
    $this->imagePath           = strtolower($imagePath);
  }

  public function resolvePlurals(InflectorInterface $inflector)
  {
    // Nothing to do here
  }

  public function definition(): string
  {
    return $this->definition;
  }

  public function examples(): string
  {
    return $this->examples;
  }

  public function howTo(): string
  {
    return $this->howTo;
  }

  public function introduction(): string
  {
    return $this->introduction;
  }

  public function priorKnowledge(): string
  {
    return $this->priorKnowledge;
  }

  public function selfAssessment(): string
  {
    return $this->selfAssessment;
  }

  public function additionalResources(): string
  {
    return $this->additionalResources;
  }

  public function synonyms(): string
  {
    return $this->synonyms;
  }

  public function theoryExplanation(): string
  {
    return $this->theoryExplanation;
  }

  public function imagePath(): string
  {
    return $this->imagePath;
  }
}
