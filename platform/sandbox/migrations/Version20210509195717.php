<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509195717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, user_id INT DEFAULT NULL, code VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, vacancies INT DEFAULT 0 NOT NULL, INDEX IDX_288A3A4E979B1AD6 (company_id), INDEX IDX_288A3A4EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_crop (job_offer_id INT NOT NULL, crop_id INT NOT NULL, INDEX IDX_794D83913481D195 (job_offer_id), INDEX IDX_794D8391888579EE (crop_id), PRIMARY KEY(job_offer_id, crop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_machinery (job_offer_id INT NOT NULL, machinery_id INT NOT NULL, INDEX IDX_74D375B73481D195 (job_offer_id), INDEX IDX_74D375B7C1282CE4 (machinery_id), PRIMARY KEY(job_offer_id, machinery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machinery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE job_offer_crop ADD CONSTRAINT FK_794D83913481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_crop ADD CONSTRAINT FK_794D8391888579EE FOREIGN KEY (crop_id) REFERENCES crop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_machinery ADD CONSTRAINT FK_74D375B73481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_machinery ADD CONSTRAINT FK_74D375B7C1282CE4 FOREIGN KEY (machinery_id) REFERENCES machinery (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer_crop DROP FOREIGN KEY FK_794D8391888579EE');
        $this->addSql('ALTER TABLE job_offer_crop DROP FOREIGN KEY FK_794D83913481D195');
        $this->addSql('ALTER TABLE job_offer_machinery DROP FOREIGN KEY FK_74D375B73481D195');
        $this->addSql('ALTER TABLE job_offer_machinery DROP FOREIGN KEY FK_74D375B7C1282CE4');
        $this->addSql('DROP TABLE crop');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_offer_crop');
        $this->addSql('DROP TABLE job_offer_machinery');
        $this->addSql('DROP TABLE machinery');
    }
}
