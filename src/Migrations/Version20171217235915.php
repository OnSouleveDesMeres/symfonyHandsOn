<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171217235915 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE golden_book ADD author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE golden_book ADD CONSTRAINT FK_67E09804F675F31B FOREIGN KEY (author_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_67E09804F675F31B ON golden_book (author_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE golden_book DROP FOREIGN KEY FK_67E09804F675F31B');
        $this->addSql('DROP INDEX IDX_67E09804F675F31B ON golden_book');
        $this->addSql('ALTER TABLE golden_book DROP author_id');
    }
}
