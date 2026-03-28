<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260320195026 extends AbstractMigration
{
  public function getDescription(): string
  {
    return 'Adds a slug field to the concept entity';
  }

  public function up(Schema $schema): void
  {
    $this->addSql('ALTER TABLE concept ADD slug VARCHAR(32) DEFAULT NULL');

    $this->addSql(<<<SQL
UPDATE concept
SET slug = UPPER(REGEXP_REPLACE(REGEXP_SUBSTR(name, '\\\\[[^\\\\]]+\\\\]'), '[\\\\[\\\\]]', ''))
SQL);

    $this->addSql('ALTER TABLE concept MODIFY slug VARCHAR(32) NOT NULL');
    $this->addSql('CREATE INDEX IDX_STUDY_AREA_CONCEPT_SLUG ON concept (study_area_id, slug)');
  }

  public function down(Schema $schema): void
  {
    $this->addSql('DROP INDEX IDX_STUDY_AREA_CONCEPT_SLUG ON concept');
    $this->addSql('ALTER TABLE concept DROP COLUMN slug');
  }

}
