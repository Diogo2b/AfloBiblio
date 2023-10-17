<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231005084717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, editeur VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, app_user_id INT NOT NULL, date_emprunt DATETIME NOT NULL, date_retour_prevu DATETIME NOT NULL, date_retour_reel DATETIME DEFAULT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_364071D74A3353D8 (app_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, app_user_id INT NOT NULL, date_reservation DATETIME NOT NULL, date_expiration DATETIME NOT NULL, etat VARCHAR(20) NOT NULL, INDEX IDX_42C849554A3353D8 (app_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D74A3353D8 FOREIGN KEY (app_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554A3353D8 FOREIGN KEY (app_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D74A3353D8');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554A3353D8');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE `user`');
    }
}
