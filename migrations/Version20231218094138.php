<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218094138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rajout de l\'entité Formateur est ses attributs ainsi que la rélation avec l\'entité Formation dans la base des données';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, description VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formations ADD formateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_40902137155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('CREATE INDEX IDX_40902137155D8F51 ON formations (formateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_40902137155D8F51');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP INDEX IDX_40902137155D8F51 ON formations');
        $this->addSql('ALTER TABLE formations DROP formateur_id');
    }
}
