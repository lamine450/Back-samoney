<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224132351 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adress_agence VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, cni INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, num_compte INT NOT NULL, solde INT NOT NULL, INDEX IDX_CFF6526067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, date_depot DATETIME NOT NULL, montant_depot INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, compte_id INT DEFAULT NULL, montant INT NOT NULL, date_depot DATETIME NOT NULL, date_retrait DATETIME NOT NULL, date_annulation DATETIME NOT NULL, ttc INT NOT NULL, frais_etat INT NOT NULL, frais_systeme INT NOT NULL, frais_envoi INT NOT NULL, frais_retrait INT NOT NULL, code_transaction INT NOT NULL, INDEX IDX_723705D167B3B43D (users_id), INDEX IDX_723705D1F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_de_transaction (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, transaction_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_568A486C67B3B43D (users_id), INDEX IDX_568A486C2FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, agence_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, cni VARCHAR(255) NOT NULL, avatar LONGBLOB NOT NULL, adress VARCHAR(255) NOT NULL, archivage TINYINT(1) NOT NULL, INDEX IDX_1483A5E9275ED078 (profil_id), INDEX IDX_1483A5E9D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_depot (users_id INT NOT NULL, depot_id INT NOT NULL, INDEX IDX_A0E32FF567B3B43D (users_id), INDEX IDX_A0E32FF58510D4DE (depot_id), PRIMARY KEY(users_id, depot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D167B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE type_de_transaction ADD CONSTRAINT FK_568A486C67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE type_de_transaction ADD CONSTRAINT FK_568A486C2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE users_depot ADD CONSTRAINT FK_A0E32FF567B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_depot ADD CONSTRAINT FK_A0E32FF58510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9D725330D');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F2C56620');
        $this->addSql('ALTER TABLE users_depot DROP FOREIGN KEY FK_A0E32FF58510D4DE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9275ED078');
        $this->addSql('ALTER TABLE type_de_transaction DROP FOREIGN KEY FK_568A486C2FC0CB0F');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526067B3B43D');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D167B3B43D');
        $this->addSql('ALTER TABLE type_de_transaction DROP FOREIGN KEY FK_568A486C67B3B43D');
        $this->addSql('ALTER TABLE users_depot DROP FOREIGN KEY FK_A0E32FF567B3B43D');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE type_de_transaction');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_depot');
    }
}
