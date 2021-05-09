<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509200258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE crop ADD deleted TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE job_offer ADD publication_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD job_start_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD job_end_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE machinery ADD deleted TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE crop DROP deleted');
        $this->addSql('ALTER TABLE job_offer DROP publication_date, DROP job_start_date, DROP job_end_date');
        $this->addSql('ALTER TABLE machinery DROP deleted');
    }
}
