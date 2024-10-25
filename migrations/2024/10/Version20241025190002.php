<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Manually generated Migration to force export url enabled default value to false. 
 */
final class Version20241025190002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Force export url enabled default to false';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE study_area CHANGE COLUMN url_export_enabled url_export_enabled TINYINT(1) NULL DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE study_area CHANGE COLUMN url_export_enabled url_export_enabled TINYINT(1) NOT NULL');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
