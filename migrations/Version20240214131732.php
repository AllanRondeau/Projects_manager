<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214131732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP name, DROP birth_date, DROP address, DROP country, DROP postal_code, DROP city');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD birth_date DATE NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD postal_code VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, DROP email, DROP password');
    }
}
