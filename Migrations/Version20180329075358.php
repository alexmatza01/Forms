<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180329075358 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE domo DROP FOREIGN KEY FK_DBD55A7680D0428C');
        $this->addSql('DROP INDEX IDX_DBD55A7680D0428C ON domo');
        $this->addSql('ALTER TABLE domo CHANGE domo_id counties_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domo ADD CONSTRAINT FK_DBD55A767B8C6BFC FOREIGN KEY (counties_id) REFERENCES counties (id)');
        $this->addSql('CREATE INDEX IDX_DBD55A767B8C6BFC ON domo (counties_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE domo DROP FOREIGN KEY FK_DBD55A767B8C6BFC');
        $this->addSql('DROP INDEX IDX_DBD55A767B8C6BFC ON domo');
        $this->addSql('ALTER TABLE domo CHANGE counties_id domo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domo ADD CONSTRAINT FK_DBD55A7680D0428C FOREIGN KEY (domo_id) REFERENCES counties (id)');
        $this->addSql('CREATE INDEX IDX_DBD55A7680D0428C ON domo (domo_id)');
    }
}
