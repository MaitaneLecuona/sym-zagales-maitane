<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222121405 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividades ADD id INT AUTO_INCREMENT NOT NULL, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE fecha fecha DATE NOT NULL, CHANGE imagen imagen INT NOT NULL, CHANGE destino destino VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE categoria ADD id INT AUTO_INCREMENT NOT NULL, CHANGE descripcion descripcion VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE usuario ADD id INT AUTO_INCREMENT NOT NULL, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE apellido apellido VARCHAR(255) NOT NULL, CHANGE telefono telefono VARCHAR(255) NOT NULL, CHANGE correo correo VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividades MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE actividades DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE actividades DROP id, CHANGE nombre nombre VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE fecha fecha DATE DEFAULT NULL, CHANGE imagen imagen VARCHAR(900) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE destino destino VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE actividades ADD PRIMARY KEY (idactividades)');
        $this->addSql('ALTER TABLE categoria MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE categoria DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE categoria DROP id, CHANGE descripcion descripcion VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE categoria ADD PRIMARY KEY (idcategoria)');
        $this->addSql('ALTER TABLE usuario MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE usuario DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE usuario DROP id, CHANGE nombre nombre VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE apellido apellido VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE telefono telefono VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE correo correo VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE usuario ADD PRIMARY KEY (idusuario)');
    }
}
