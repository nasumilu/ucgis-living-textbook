<?php

namespace App\Naming\Model;

use Override;
use Symfony\Component\String\Inflector\InflectorInterface;

use function strtolower;
use function Symfony\Component\String\u;

class ResolvedLearningOutcomeNames implements ResolvedNamesInterface
{
  private string $obj;
  /** @var string */
  private $objs;

  public function __construct(string $obj)
  {
    $this->obj = strtolower($obj);
  }

  #[Override]
  public function resolvePlurals(InflectorInterface $inflector)
  {
    $this->objs = $inflector->pluralize($this->obj)[0];
  }

  public function obj(bool $titleCase = false): string
  {
    return $titleCase ? u($this->obj)->title() : $this->obj;
  }

  public function objs(bool $titleCase = false): string
  {
    return $titleCase ? u($this->objs)->title() : $this->objs;
  }
}
