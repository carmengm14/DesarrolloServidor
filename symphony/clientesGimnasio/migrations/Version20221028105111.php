<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028105111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientes ADD tarifas_id INT NOT NULL');
        $this->addSql('ALTER TABLE clientes ADD CONSTRAINT FK_50FE07D73D1EE642 FOREIGN KEY (tarifas_id) REFERENCES tarifas (id)');
        $this->addSql('CREATE INDEX IDX_50FE07D73D1EE642 ON clientes (tarifas_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientes DROP FOREIGN KEY FK_50FE07D73D1EE642');
        $this->addSql('DROP INDEX IDX_50FE07D73D1EE642 ON clientes');
        $this->addSql('ALTER TABLE clientes DROP tarifas_id');
    }
}
