<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180726120028 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('SELECT setval(\'commune_id_seq\', (SELECT MAX(id) FROM commune))');
        $this->addSql('ALTER TABLE commune ALTER id SET DEFAULT nextval(\'commune_id_seq\')');

        $this->addSql("INSERT INTO commune (code_postal, nom) VALUES ('49000', 'ANGERS')");
        $this->addSql("INSERT INTO commune (code_postal, nom) VALUES ('35000', 'RENNES')");
        $this->addSql("INSERT INTO commune (code_postal, nom) VALUES ('35520', 'MELESSE')");
    }

    public function down(Schema $schema) : void
    {
    }
}
