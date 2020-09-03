<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902202337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE acesso_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cliente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE endereco_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cliente (id INT NOT NULL, cod BIGINT NOT NULL, nome VARCHAR(255) NOT NULL, nascimento DATE NOT NULL, cpf VARCHAR(11) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE endereco (id INT NOT NULL, cod_cliente_id INT NOT NULL, cod BIGINT NOT NULL, logradouro VARCHAR(500) NOT NULL, numero_imovel INT NOT NULL, complemento VARCHAR(500) DEFAULT NULL, bairro VARCHAR(500) NOT NULL, cidade VARCHAR(500) NOT NULL, estado VARCHAR(500) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8E0D60EF56F84EC ON endereco (cod_cliente_id)');
        $this->addSql('CREATE TABLE acesso (id INT NOT NULL, cod_cliente_id INT NOT NULL, cod BIGINT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FA8F705F56F84EC ON acesso (cod_cliente_id)');
        $this->addSql('ALTER TABLE endereco ADD CONSTRAINT FK_F8E0D60EF56F84EC FOREIGN KEY (cod_cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE acesso ADD CONSTRAINT FK_2FA8F705F56F84EC FOREIGN KEY (cod_cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE acesso DROP CONSTRAINT FK_2FA8F705F56F84EC');
        $this->addSql('ALTER TABLE endereco DROP CONSTRAINT FK_F8E0D60EF56F84EC');
        $this->addSql('DROP SEQUENCE acesso_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cliente_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE endereco_id_seq CASCADE');
        $this->addSql('DROP TABLE acesso');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE endereco');
    }
}
