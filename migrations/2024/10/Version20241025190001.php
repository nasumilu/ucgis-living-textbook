<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Manually generated Migration to resolve the null value for definition. 
 */
final class Version20241025190001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Set definition default to null';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE concept CHANGE COLUMN definition definition LONGTEXT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE concept CHANGE COLUMN definition  definition LONGTEXT NOT NULL');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
