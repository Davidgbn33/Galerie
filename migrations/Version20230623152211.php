<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230623152211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD user_id INT DEFAULT NULL, ADD paint_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9017B5FF FOREIGN KEY (paint_id) REFERENCES paint (id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C9017B5FF ON comment (paint_id)');
        $this->addSql('ALTER TABLE paint ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paint ADD CONSTRAINT FK_577A841712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_577A841712469DE2 ON paint (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9017B5FF');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C9017B5FF ON comment');
        $this->addSql('ALTER TABLE comment DROP user_id, DROP paint_id');
        $this->addSql('ALTER TABLE paint DROP FOREIGN KEY FK_577A841712469DE2');
        $this->addSql('DROP INDEX IDX_577A841712469DE2 ON paint');
        $this->addSql('ALTER TABLE paint DROP category_id');
    }
}
