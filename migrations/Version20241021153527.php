<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241021153527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lessons ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9727ACA70 FOREIGN KEY (parent_id) REFERENCES lessons (id)');
        $this->addSql('CREATE INDEX IDX_3F4218D9727ACA70 ON lessons (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9727ACA70');
        $this->addSql('DROP INDEX IDX_3F4218D9727ACA70 ON lessons');
        $this->addSql('ALTER TABLE lessons DROP parent_id');
    }
}
