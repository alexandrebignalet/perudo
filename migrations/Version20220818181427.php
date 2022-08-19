<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220818181427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('CREATE EXTENSION "uuid-ossp"');
        $this->addSql('ALTER TABLE game ALTER id TYPE UUID USING (uuid_generate_v4())');
        $this->addSql('COMMENT ON COLUMN game.id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE game ALTER id TYPE INT');
        $this->addSql('COMMENT ON COLUMN game.id IS NULL');
    }
}
