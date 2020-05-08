<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508004220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, date_demande DATE NOT NULL, type_demande VARCHAR(255) NOT NULL, INDEX IDX_2694D7A5DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C1765B63180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, filiere_etudiant_id INT DEFAULT NULL, diplome VARCHAR(255) NOT NULL, filiere VARCHAR(255) NOT NULL, INDEX IDX_717E22E3A0B11404 (filiere_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, module VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_matiere (filiere_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_F09B15C9180AA129 (filiere_id), INDEX IDX_F09B15C9F46CD258 (matiere_id), PRIMARY KEY(filiere_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_etudiant (id INT AUTO_INCREMENT NOT NULL, niveau VARCHAR(255) NOT NULL, promotion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_etudiant_filiere (filiere_etudiant_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_B8B57F41A0B11404 (filiere_etudiant_id), INDEX IDX_B8B57F41180AA129 (filiere_id), PRIMARY KEY(filiere_etudiant_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, nom_matiere VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_professeur (matiere_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_C56DD937F46CD258 (matiere_id), INDEX IDX_C56DD937BAB22EE9 (professeur_id), PRIMARY KEY(matiere_id, professeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, mode VARCHAR(255) NOT NULL, INDEX IDX_B1DC7A1EDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, matiere_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, encadrant VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, type_projet VARCHAR(255) NOT NULL, INDEX IDX_50159CA9F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, entreprise VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, type_stage VARCHAR(255) NOT NULL, encadrant VARCHAR(255) NOT NULL, INDEX IDX_C27C9369DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3A0B11404 FOREIGN KEY (filiere_etudiant_id) REFERENCES filiere_etudiant (id)');
        $this->addSql('ALTER TABLE filiere_matiere ADD CONSTRAINT FK_F09B15C9180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_matiere ADD CONSTRAINT FK_F09B15C9F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_etudiant_filiere ADD CONSTRAINT FK_B8B57F41A0B11404 FOREIGN KEY (filiere_etudiant_id) REFERENCES filiere_etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_etudiant_filiere ADD CONSTRAINT FK_B8B57F41180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_professeur ADD CONSTRAINT FK_C56DD937F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_professeur ADD CONSTRAINT FK_C56DD937BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5DDEAB1A3');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EDDEAB1A3');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369DDEAB1A3');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63180AA129');
        $this->addSql('ALTER TABLE filiere_matiere DROP FOREIGN KEY FK_F09B15C9180AA129');
        $this->addSql('ALTER TABLE filiere_etudiant_filiere DROP FOREIGN KEY FK_B8B57F41180AA129');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3A0B11404');
        $this->addSql('ALTER TABLE filiere_etudiant_filiere DROP FOREIGN KEY FK_B8B57F41A0B11404');
        $this->addSql('ALTER TABLE filiere_matiere DROP FOREIGN KEY FK_F09B15C9F46CD258');
        $this->addSql('ALTER TABLE matiere_professeur DROP FOREIGN KEY FK_C56DD937F46CD258');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9F46CD258');
        $this->addSql('ALTER TABLE matiere_professeur DROP FOREIGN KEY FK_C56DD937BAB22EE9');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE filiere_matiere');
        $this->addSql('DROP TABLE filiere_etudiant');
        $this->addSql('DROP TABLE filiere_etudiant_filiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_professeur');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE professeur');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE user');
    }
}
