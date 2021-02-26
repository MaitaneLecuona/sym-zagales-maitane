<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222124702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividades ADD id_prop_id INT DEFAULT NULL, ADD id_categ_id INT DEFAULT NULL, CHANGE imagen imagen VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE actividades ADD CONSTRAINT FK_73D548DE2E56CD FOREIGN KEY (id_prop_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE actividades ADD CONSTRAINT FK_73D548DEB8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_73D548DE2E56CD ON actividades (id_prop_id)');
        $this->addSql('CREATE INDEX IDX_73D548DEB8CCB787 ON actividades (id_categ_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividades DROP FOREIGN KEY FK_73D548DE2E56CD');
        $this->addSql('ALTER TABLE actividades DROP FOREIGN KEY FK_73D548DEB8CCB787');
        $this->addSql('DROP INDEX IDX_73D548DE2E56CD ON actividades');
        $this->addSql('DROP INDEX IDX_73D548DEB8CCB787 ON actividades');
        $this->addSql('ALTER TABLE actividades DROP id_prop_id, DROP id_categ_id, CHANGE imagen imagen INT NOT NULL');
    }
}
