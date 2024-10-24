<?php

namespace App\Entity\Data;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: DataAdditionalResourcesRepository::class)]
#[ORM\Table]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt')]
class DataAdditionalResources implements DataInterface
{
  use BaseDataTextObject;
}
