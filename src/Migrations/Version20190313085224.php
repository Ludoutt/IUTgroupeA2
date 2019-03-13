<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190313085224 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE element CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE position position INT DEFAULT NULL, CHANGE complexity complexity INT DEFAULT NULL, CHANGE nb_hours nb_hours INT DEFAULT NULL, CHANGE acceptation_criteria acceptation_criteria LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE element CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE type type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE position position INT NOT NULL, CHANGE complexity complexity INT NOT NULL, CHANGE nb_hours nb_hours INT NOT NULL, CHANGE acceptation_criteria acceptation_criteria LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
