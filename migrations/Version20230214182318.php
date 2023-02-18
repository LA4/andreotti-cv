<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214182318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pictures_categories DROP FOREIGN KEY FK_DACB658AA21214B7');
        $this->addSql('ALTER TABLE pictures_categories DROP FOREIGN KEY FK_DACB658ABC415685');
        $this->addSql('DROP TABLE pictures_categories');
        $this->addSql('ALTER TABLE categories ADD pictures_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668BC415685 ON categories (pictures_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pictures_categories (pictures_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_DACB658ABC415685 (pictures_id), INDEX IDX_DACB658AA21214B7 (categories_id), PRIMARY KEY(pictures_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pictures_categories ADD CONSTRAINT FK_DACB658AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pictures_categories ADD CONSTRAINT FK_DACB658ABC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668BC415685');
        $this->addSql('DROP INDEX IDX_3AF34668BC415685 ON categories');
        $this->addSql('ALTER TABLE categories DROP pictures_id');
    }
}
