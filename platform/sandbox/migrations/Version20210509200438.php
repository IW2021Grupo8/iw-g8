<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509200438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_crop (user_id INT NOT NULL, crop_id INT NOT NULL, INDEX IDX_97437152A76ED395 (user_id), INDEX IDX_97437152888579EE (crop_id), PRIMARY KEY(user_id, crop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_machinery (user_id INT NOT NULL, machinery_id INT NOT NULL, INDEX IDX_3C6ACAF8A76ED395 (user_id), INDEX IDX_3C6ACAF8C1282CE4 (machinery_id), PRIMARY KEY(user_id, machinery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_crop ADD CONSTRAINT FK_97437152A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_crop ADD CONSTRAINT FK_97437152888579EE FOREIGN KEY (crop_id) REFERENCES crop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_machinery ADD CONSTRAINT FK_3C6ACAF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_machinery ADD CONSTRAINT FK_3C6ACAF8C1282CE4 FOREIGN KEY (machinery_id) REFERENCES machinery (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_crop');
        $this->addSql('DROP TABLE user_machinery');
    }
}
