<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514195531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pfe CHANGE title title VARCHAR(255) NOT NULL, CHANGE student student VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE name name VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE pfe CHANGE title title VARCHAR(20) NOT NULL, CHANGE student student VARCHAR(20) NOT NULL');
    }
}
