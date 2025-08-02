<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802024246 extends AbstractMigration
{
  public function getDescription(): string
  {
    return 'Alter the learning_outcom.text so it may contain null';
  }

  public function up(Schema $schema): void
  {
    $this->addSql('ALTER TABLE learning_outcome CHANGE text text LONGTEXT DEFAULT NULL');
  }

  /**
   * When migrating back to a not null column, it is the maintainers responsible to add content
   * to any null column values.
   *
   * @param Schema $schema
   *
   * @return void
   */
  public function down(Schema $schema): void
  {
    $this->addSql('ALTER TABLE learning_outcome CHANGE text text LONGTEXT NOT NULL');

  }

  public function isTransactional(): bool
  {
    return false;
  }
}
