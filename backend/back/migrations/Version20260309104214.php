<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260309104214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, phone VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, service_id INT DEFAULT NULL, site_id INT DEFAULT NULL, INDEX IDX_5D9F75A1ED5CA9E6 (service_id), INDEX IDX_5D9F75A1F6BD1646 (site_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1ED5CA9E6');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1F6BD1646');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE site');
    }
}
