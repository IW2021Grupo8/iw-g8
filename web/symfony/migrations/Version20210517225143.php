<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517225143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assessment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, valued_company_id INT DEFAULT NULL, valued_user_id INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, rating INT NOT NULL, publication_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_F7523D70A76ED395 (user_id), INDEX IDX_F7523D70539EC087 (valued_company_id), INDEX IDX_F7523D70321BAFCA (valued_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, vat VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_4FBF094F84B32233 (vat), INDEX IDX_4FBF094FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5373C96677153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gang (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_E6080363A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, job_offer_id INT DEFAULT NULL, user_id INT DEFAULT NULL, crop_id INT DEFAULT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', state INT DEFAULT 0 NOT NULL, INDEX IDX_5E90F6D63481D195 (job_offer_id), INDEX IDX_5E90F6D6A76ED395 (user_id), INDEX IDX_5E90F6D6888579EE (crop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, user_id INT DEFAULT NULL, code VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, publication_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', job_start_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', job_end_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', vacancies INT DEFAULT 0 NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_288A3A4E979B1AD6 (company_id), INDEX IDX_288A3A4EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_crop (job_offer_id INT NOT NULL, crop_id INT NOT NULL, INDEX IDX_794D83913481D195 (job_offer_id), INDEX IDX_794D8391888579EE (crop_id), PRIMARY KEY(job_offer_id, crop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_machinery (job_offer_id INT NOT NULL, machinery_id INT NOT NULL, INDEX IDX_74D375B73481D195 (job_offer_id), INDEX IDX_74D375B7C1282CE4 (machinery_id), PRIMARY KEY(job_offer_id, machinery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machinery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_crop (user_id INT NOT NULL, crop_id INT NOT NULL, INDEX IDX_97437152A76ED395 (user_id), INDEX IDX_97437152888579EE (crop_id), PRIMARY KEY(user_id, crop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_machinery (user_id INT NOT NULL, machinery_id INT NOT NULL, INDEX IDX_3C6ACAF8A76ED395 (user_id), INDEX IDX_3C6ACAF8C1282CE4 (machinery_id), PRIMARY KEY(user_id, machinery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_gang (user_id INT NOT NULL, gang_id INT NOT NULL, INDEX IDX_9C894FAAA76ED395 (user_id), INDEX IDX_9C894FAA9266B5E (gang_id), PRIMARY KEY(user_id, gang_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70539EC087 FOREIGN KEY (valued_company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70321BAFCA FOREIGN KEY (valued_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE gang ADD CONSTRAINT FK_E6080363A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6888579EE FOREIGN KEY (crop_id) REFERENCES crop (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE job_offer_crop ADD CONSTRAINT FK_794D83913481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_crop ADD CONSTRAINT FK_794D8391888579EE FOREIGN KEY (crop_id) REFERENCES crop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_machinery ADD CONSTRAINT FK_74D375B73481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_machinery ADD CONSTRAINT FK_74D375B7C1282CE4 FOREIGN KEY (machinery_id) REFERENCES machinery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user_crop ADD CONSTRAINT FK_97437152A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_crop ADD CONSTRAINT FK_97437152888579EE FOREIGN KEY (crop_id) REFERENCES crop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_machinery ADD CONSTRAINT FK_3C6ACAF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_machinery ADD CONSTRAINT FK_3C6ACAF8C1282CE4 FOREIGN KEY (machinery_id) REFERENCES machinery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_gang ADD CONSTRAINT FK_9C894FAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_gang ADD CONSTRAINT FK_9C894FAA9266B5E FOREIGN KEY (gang_id) REFERENCES gang (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE migration_versions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assessment DROP FOREIGN KEY FK_F7523D70539EC087');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF92F3E70');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6888579EE');
        $this->addSql('ALTER TABLE job_offer_crop DROP FOREIGN KEY FK_794D8391888579EE');
        $this->addSql('ALTER TABLE user_crop DROP FOREIGN KEY FK_97437152888579EE');
        $this->addSql('ALTER TABLE user_gang DROP FOREIGN KEY FK_9C894FAA9266B5E');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63481D195');
        $this->addSql('ALTER TABLE job_offer_crop DROP FOREIGN KEY FK_794D83913481D195');
        $this->addSql('ALTER TABLE job_offer_machinery DROP FOREIGN KEY FK_74D375B73481D195');
        $this->addSql('ALTER TABLE job_offer_machinery DROP FOREIGN KEY FK_74D375B7C1282CE4');
        $this->addSql('ALTER TABLE user_machinery DROP FOREIGN KEY FK_3C6ACAF8C1282CE4');
        $this->addSql('ALTER TABLE assessment DROP FOREIGN KEY FK_F7523D70A76ED395');
        $this->addSql('ALTER TABLE assessment DROP FOREIGN KEY FK_F7523D70321BAFCA');
        $this->addSql('ALTER TABLE gang DROP FOREIGN KEY FK_E6080363A76ED395');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A76ED395');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EA76ED395');
        $this->addSql('ALTER TABLE user_crop DROP FOREIGN KEY FK_97437152A76ED395');
        $this->addSql('ALTER TABLE user_machinery DROP FOREIGN KEY FK_3C6ACAF8A76ED395');
        $this->addSql('ALTER TABLE user_gang DROP FOREIGN KEY FK_9C894FAAA76ED395');
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE assessment');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE crop');
        $this->addSql('DROP TABLE gang');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_offer_crop');
        $this->addSql('DROP TABLE job_offer_machinery');
        $this->addSql('DROP TABLE machinery');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_crop');
        $this->addSql('DROP TABLE user_machinery');
        $this->addSql('DROP TABLE user_gang');
    }
}
