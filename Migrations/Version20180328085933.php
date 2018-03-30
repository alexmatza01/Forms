<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180328085933 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cities ADD counties_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16B7B8C6BFC FOREIGN KEY (counties_id) REFERENCES counties (id)');
        $this->addSql('CREATE INDEX IDX_D95DB16B7B8C6BFC ON cities (counties_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16B7B8C6BFC');
        $this->addSql('DROP INDEX IDX_D95DB16B7B8C6BFC ON cities');
        $this->addSql('ALTER TABLE cities DROP counties_id');
    }
}
