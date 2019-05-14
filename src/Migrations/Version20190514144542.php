<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514144542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE tiny_puppy (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE grumpy_elephant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tiny_puppy_id INTEGER DEFAULT NULL, code VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2339951EA10EBE4 ON grumpy_elephant (tiny_puppy_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE tiny_puppy');
        $this->addSql('DROP TABLE grumpy_elephant');
    }
}
