<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214183141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668BC415685');
        $this->addSql('DROP INDEX IDX_3AF34668BC415685 ON categories');
        $this->addSql('ALTER TABLE categories DROP pictures_id');
        $this->addSql('ALTER TABLE pictures ADD categories_id INT NOT NULL, ADD relation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_8F7C2FC0A21214B7 ON pictures (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD pictures_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3AF34668BC415685 ON categories (pictures_id)');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC0A21214B7');
        $this->addSql('DROP INDEX IDX_8F7C2FC0A21214B7 ON pictures');
        $this->addSql('ALTER TABLE pictures DROP categories_id, DROP relation');
    }
}
