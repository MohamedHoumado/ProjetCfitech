<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210100513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation de la base de donnee, ses tables et leurs champs ou attributs';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, intitule_formation VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, duree INT NOT NULL, lieu_formation VARCHAR(255) NOT NULL, nombre_participants_max INT NOT NULL, inscription_ouvertes TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE informaticiens (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, nom_informaticien VARCHAR(255) NOT NULL, prenom_informaticien VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse_informaticien VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, experience_annee INT NOT NULL, niveau_etude VARCHAR(255) NOT NULL, certification LONGTEXT NOT NULL, date_embauche DATE NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_93B997FFED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, nom_service VARCHAR(255) NOT NULL, description_service VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, effectif_max INT NOT NULL, statut_actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaires (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, nom_stagiaire VARCHAR(255) NOT NULL, prenom_stagiaire VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, niveau_etude VARCHAR(255) NOT NULL, numero_national_stagiaire VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, compte_bancaire_stagiaire VARCHAR(255) NOT NULL, INDEX IDX_4A9FADC65200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE informaticiens ADD CONSTRAINT FK_93B997FFED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE stagiaires ADD CONSTRAINT FK_4A9FADC65200282E FOREIGN KEY (formation_id) REFERENCES formations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE informaticiens DROP FOREIGN KEY FK_93B997FFED5CA9E6');
        $this->addSql('ALTER TABLE stagiaires DROP FOREIGN KEY FK_4A9FADC65200282E');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE informaticiens');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE stagiaires');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
