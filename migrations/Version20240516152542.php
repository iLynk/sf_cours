<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516152542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cake ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE cake ADD CONSTRAINT FK_FA13015D12469DE2 FOREIGN KEY (category_id) REFERENCES cake_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FA13015D12469DE2 ON cake (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cake DROP CONSTRAINT FK_FA13015D12469DE2');
        $this->addSql('DROP INDEX IDX_FA13015D12469DE2');
        $this->addSql('ALTER TABLE cake DROP category_id');
    }
}
