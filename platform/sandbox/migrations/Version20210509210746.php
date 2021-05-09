<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509210746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assessment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, valued_company_id INT DEFAULT NULL, valued_user_id INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, rating INT NOT NULL, publication_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_F7523D70A76ED395 (user_id), INDEX IDX_F7523D70539EC087 (valued_company_id), INDEX IDX_F7523D70321BAFCA (valued_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, job_offer_id INT DEFAULT NULL, user_id INT DEFAULT NULL, crop_id INT DEFAULT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', state INT DEFAULT 0 NOT NULL, INDEX IDX_5E90F6D63481D195 (job_offer_id), INDEX IDX_5E90F6D6A76ED395 (user_id), INDEX IDX_5E90F6D6888579EE (crop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70539EC087 FOREIGN KEY (valued_company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70321BAFCA FOREIGN KEY (valued_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6888579EE FOREIGN KEY (crop_id) REFERENCES crop (id)');
        $this->addSql('ALTER TABLE job_offer ADD deleted TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assessment');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('ALTER TABLE job_offer DROP deleted');
    }
}
