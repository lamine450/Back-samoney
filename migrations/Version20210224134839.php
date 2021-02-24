<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224134839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users_depot');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526067B3B43D');
        $this->addSql('DROP INDEX IDX_CFF6526067B3B43D ON compte');
        $this->addSql('ALTER TABLE compte DROP users_id');
        $this->addSql('ALTER TABLE depot ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_47948BBC67B3B43D ON depot (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_depot (users_id INT NOT NULL, depot_id INT NOT NULL, INDEX IDX_A0E32FF567B3B43D (users_id), INDEX IDX_A0E32FF58510D4DE (depot_id), PRIMARY KEY(users_id, depot_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users_depot ADD CONSTRAINT FK_A0E32FF567B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_depot ADD CONSTRAINT FK_A0E32FF58510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526067B3B43D ON compte (users_id)');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC67B3B43D');
        $this->addSql('DROP INDEX IDX_47948BBC67B3B43D ON depot');
        $this->addSql('ALTER TABLE depot DROP users_id');
    }
}
