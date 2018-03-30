<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180329110334 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE counties (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE domo DROP FOREIGN KEY FK_DBD55A767B8C6BFC');
        $this->addSql('DROP INDEX IDX_DBD55A767B8C6BFC ON domo');
        $this->addSql('ALTER TABLE domo DROP counties_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE counties');
        $this->addSql('ALTER TABLE domo ADD counties_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domo ADD CONSTRAINT FK_DBD55A767B8C6BFC FOREIGN KEY (counties_id) REFERENCES counties (id)');
        $this->addSql('CREATE INDEX IDX_DBD55A767B8C6BFC ON domo (counties_id)');
    }
}
