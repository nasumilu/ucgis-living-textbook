<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802032107 extends AbstractMigration
{
  public function getDescription(): string
  {
    return 'Migration increased length of abbreviation and meaning.';
  }

  public function up(Schema $schema): void
  {
    $this->addSql('alter table abbreviation modify abbreviation varchar(255) not null');
    $this->addSql('alter table abbreviation modify meaning text not null');
  }

  public function down(Schema $schema): void
  {
    $this->addSql('alter table abbreviation modify abbreviation varchar(25) not null');
    $this->addSql('alter table abbreviation modify meaning varchar(255) not null');
  }

  public function isTransactional(): bool
  {
    return false;
  }
}
