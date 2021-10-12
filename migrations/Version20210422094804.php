<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422094804 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favorites (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorites_user (favorites_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1650483B84DDC6B4 (favorites_id), INDEX IDX_1650483BA76ED395 (user_id), PRIMARY KEY(favorites_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorites_palette (favorites_id INT NOT NULL, palette_id INT NOT NULL, INDEX IDX_7D3F2F4584DDC6B4 (favorites_id), INDEX IDX_7D3F2F45908BC74 (palette_id), PRIMARY KEY(favorites_id, palette_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorites_user ADD CONSTRAINT FK_1650483B84DDC6B4 FOREIGN KEY (favorites_id) REFERENCES favorites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorites_user ADD CONSTRAINT FK_1650483BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorites_palette ADD CONSTRAINT FK_7D3F2F4584DDC6B4 FOREIGN KEY (favorites_id) REFERENCES favorites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorites_palette ADD CONSTRAINT FK_7D3F2F45908BC74 FOREIGN KEY (palette_id) REFERENCES palette (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorites_user DROP FOREIGN KEY FK_1650483B84DDC6B4');
        $this->addSql('ALTER TABLE favorites_palette DROP FOREIGN KEY FK_7D3F2F4584DDC6B4');
        $this->addSql('DROP TABLE favorites');
        $this->addSql('DROP TABLE favorites_user');
        $this->addSql('DROP TABLE favorites_palette');
    }
}
