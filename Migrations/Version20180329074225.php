<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180329074225 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE counties ADD domo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE counties ADD CONSTRAINT FK_4988696380D0428C FOREIGN KEY (domo_id) REFERENCES domo (id)');
        $this->addSql('CREATE INDEX IDX_4988696380D0428C ON counties (domo_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE counties DROP FOREIGN KEY FK_4988696380D0428C');
        $this->addSql('DROP INDEX IDX_4988696380D0428C ON counties');
        $this->addSql('ALTER TABLE counties DROP domo_id');
    }
}
