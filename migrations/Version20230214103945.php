<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214103945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories_pictures (categories_id INT NOT NULL, pictures_id INT NOT NULL, INDEX IDX_598286F9A21214B7 (categories_id), INDEX IDX_598286F9BC415685 (pictures_id), PRIMARY KEY(categories_id, pictures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_pictures ADD CONSTRAINT FK_598286F9A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_pictures ADD CONSTRAINT FK_598286F9BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pictures_categories DROP FOREIGN KEY FK_DACB658AA21214B7');
        $this->addSql('ALTER TABLE pictures_categories DROP FOREIGN KEY FK_DACB658ABC415685');
        $this->addSql('DROP TABLE pictures_categories');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pictures_categories (pictures_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_DACB658ABC415685 (pictures_id), INDEX IDX_DACB658AA21214B7 (categories_id), PRIMARY KEY(pictures_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pictures_categories ADD CONSTRAINT FK_DACB658AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pictures_categories ADD CONSTRAINT FK_DACB658ABC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_pictures DROP FOREIGN KEY FK_598286F9A21214B7');
        $this->addSql('ALTER TABLE categories_pictures DROP FOREIGN KEY FK_598286F9BC415685');
        $this->addSql('DROP TABLE categories_pictures');
    }
}
