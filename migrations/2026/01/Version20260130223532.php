<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Symfony\Component\String\Slugger\AsciiSlugger;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260130223532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds a slug field to the concept entity';
    }

    public function up(Schema $schema): void
    {
      $this->addSql('ALTER TABLE concept ADD slug VARCHAR(32)');

      $locale = $_ENV['APP_LOCALE'] ?? $_SERVER['APP_LOCALE'] ?? 'en';

      $slugger = new AsciiSlugger($locale);

      $rows = $this->connection->fetchAllAssociative('SELECT id, name FROM concept');
      foreach($rows as $row) {
        $id = (int) $row['id'];
        $name = $row['name'];
        $slug = $slugger->slug($name)->lower()->slice(0, 9)->toString();

        $this->addSql('UPDATE concept SET slug = :slug WHERE id = :id',
          [
            'slug' => $slug,
            'id' => $id,
          ]
        );
      }

      $this->addSql('ALTER TABLE concept MODIFY slug VARCHAR(32) NOT NULL');
      $this->addSql('CREATE INDEX IDX_STUDY_AREA_CONCEPT_SLUG ON concept (study_area_id, slug)');
    }

    public function down(Schema $schema): void
    {
      $this->addSql('DROP INDEX IDX_STUDY_AREA_CONCEPT_SLUG ON concept');
      $this->addSql('ALTER TABLE concept DROP COLUMN slug');
    }

    public function isTransactional(): bool
    {
        return true;
    }
}
