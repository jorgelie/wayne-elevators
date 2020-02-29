<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229104101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `elevator_call` (id INT AUTO_INCREMENT NOT NULL, call_time TIME NOT NULL, origin INT NOT NULL, destiny INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elevator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, position INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE floor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movement (id INT AUTO_INCREMENT NOT NULL, elevator_id INT NOT NULL, elevator_call_id INT NOT NULL, sequence VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql("ALTER TABLE `elevator_call` ADD CONSTRAINT `fk_origin` FOREIGN KEY (`origin`) REFERENCES `floor`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
        $this->addSql("ALTER TABLE `elevator_call` ADD CONSTRAINT `fk_destiny` FOREIGN KEY (`destiny`) REFERENCES `floor`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `elevator_call`');
        $this->addSql('DROP TABLE elevator');
        $this->addSql('DROP TABLE floor');
        $this->addSql('DROP TABLE movement');
    }
}
