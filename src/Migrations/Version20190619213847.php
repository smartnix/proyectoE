<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190619213847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

       
        $this->addSql('ALTER TABLE tipo_de_identificacion ADD id INT AUTO_INCREMENT NOT NULL, CHANGE TIPO_ID tipo_id INT NOT NULL, CHANGE DESCRICION descricion VARCHAR(45) NOT NULL');
        $this->addSql('ALTER TABLE tipo_de_identificacion ADD PRIMARY KEY (id)');
       
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tipo_de_identificacion MODIFY id INT NOT NULL');
      
        $this->addSql('ALTER TABLE tipo_de_identificacion DROP id, CHANGE tipo_id TIPO_ID INT NOT NULL COMMENT \'Campo que indica el tipo de identificacion de la persona.\', CHANGE descricion DESCRICION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica el tipo de identificacion de la persona.
                1. Cedula de ciudadania.
                2. Cedula de extrangeria.
                3. Tarjeta de identidad.
                4. Pasaporte.
                5. NIT.\'');
        $this->addSql('ALTER TABLE tipo_de_identificacion ADD PRIMARY KEY (id)');
        
    }
}
