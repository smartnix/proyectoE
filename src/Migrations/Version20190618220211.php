<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190618220211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oficina_convenio DROP FOREIGN KEY fk_OFICINA_CONVENIO_CIUDAD1');
        $this->addSql('ALTER TABLE oficinas DROP FOREIGN KEY fk_OFICINAS_CIUDAD1');
        $this->addSql('ALTER TABLE oficina_convenio DROP FOREIGN KEY fk_OFICINA_CONVENIO_CONVENIO1');
        $this->addSql('ALTER TABLE ciudad DROP FOREIGN KEY fk_CIUDAD_DEPARTAMENTO1');
        $this->addSql('ALTER TABLE pregunta_encuesta DROP FOREIGN KEY fk_PREGUNTA_ENCUESTA_ENCUESTAS1');
        $this->addSql('ALTER TABLE encuestas DROP FOREIGN KEY fk_ENCUESTAS_ESTADO1');
        $this->addSql('ALTER TABLE menu_back_end DROP FOREIGN KEY fk_MENU_BACK_END_ESTADO1');
        $this->addSql('ALTER TABLE solicitud_productos DROP FOREIGN KEY fk_SELECCION_PRODUCTOS_ESTADO1');
        $this->addSql('ALTER TABLE usuario_has_menu_back_end DROP FOREIGN KEY fk_USUARIO_has_MENU_BACK_END_MENU_BACK_END1');
        $this->addSql('ALTER TABLE respuestas DROP FOREIGN KEY fk_RESPUESTAS_POSIBLES_RESPUESTAS1');
        $this->addSql('ALTER TABLE posibles_respuestas DROP FOREIGN KEY fk_POSIBLES_RESPUESTAS_PREGUNTA_ENCUESTA1');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY fk_USUARIO_TIPO_DE_IDENTIFICACION0');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY fk_USUARIO_TIPO_DE_USUARIO1');
        $this->addSql('ALTER TABLE dispositivos DROP FOREIGN KEY fk_DISPOSITIVOS_USUARIO1');
        $this->addSql('ALTER TABLE notificaciones DROP FOREIGN KEY fk_NOTIFICACIONES_USUARIO1');
        $this->addSql('ALTER TABLE usuario_has_menu_back_end DROP FOREIGN KEY fk_USUARIO_has_MENU_BACK_END_USUARIO1');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
       
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ciudad (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, DEPARTAMENTO_ID INT NOT NULL, INDEX fk_CIUDAD_DEPARTAMENTO1_idx (DEPARTAMENTO_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE convenio (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE departamento (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dispositivos (ID INT AUTO_INCREMENT NOT NULL, TOKEN VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, IMEI VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, MODELO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, USUARIO_CODIGO INT NOT NULL, INDEX fk_DISPOSITIVOS_USUARIO1_idx (USUARIO_CODIGO), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE encuestas (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(200) NOT NULL COLLATE latin1_swedish_ci, ESTADO_ID INT NOT NULL, INDEX fk_ENCUESTAS_ESTADO1_idx (ESTADO_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE estado (ID INT AUTO_INCREMENT NOT NULL, DESCRIPCION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_back_end (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, ESTADO INT NOT NULL, INDEX fk_MENU_BACK_END_ESTADO1_idx (ESTADO), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE notificaciones (ID INT AUTO_INCREMENT NOT NULL, TITULO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, MENSAJE VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, FECHA_ENVIO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, USUARIO_CODIGO INT NOT NULL, INDEX fk_NOTIFICACIONES_USUARIO1_idx (USUARIO_CODIGO), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE oficina_convenio (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, DIRECCION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, TELEFONO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CELULAR VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CORREO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, HORARIO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CONVENIO_ID INT NOT NULL, CIUDAD_ID INT NOT NULL, INDEX fk_OFICINA_CONVENIO_CONVENIO1_idx (CONVENIO_ID), INDEX fk_OFICINA_CONVENIO_CIUDAD1_idx (CIUDAD_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE oficinas (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(200) NOT NULL COLLATE latin1_swedish_ci, DIRECCION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, TELEFONO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CELULAR VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, HORARIO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CORREO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, CIUDAD_ID INT NOT NULL, LATITUD VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, LONGITUD VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, INDEX fk_OFICINAS_CIUDAD1_idx (CIUDAD_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posibles_respuestas (ID INT AUTO_INCREMENT NOT NULL, RESPUESTA VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, PREGUNTA_ENCUESTA_ID INT NOT NULL, INDEX fk_POSIBLES_RESPUESTAS_PREGUNTA_ENCUESTA1_idx (PREGUNTA_ENCUESTA_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pregunta_encuesta (ID INT AUTO_INCREMENT NOT NULL, PREGUNTA VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, ENCUESTAS_ID INT NOT NULL, INDEX fk_PREGUNTA_ENCUESTA_ENCUESTAS1_idx (ENCUESTAS_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE respuestas (ID INT AUTO_INCREMENT NOT NULL, POSIBLES_RESPUESTAS_ID INT NOT NULL, INDEX fk_RESPUESTAS_POSIBLES_RESPUESTAS1_idx (POSIBLES_RESPUESTAS_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE solicitud_productos (ID INT AUTO_INCREMENT NOT NULL, NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, URL VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, ESTADO_ID INT NOT NULL, INDEX fk_SELECCION_PRODUCTOS_ESTADO1_idx (ESTADO_ID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tipo_de_identificacion (TIPO_ID INT NOT NULL COMMENT \'Campo que indica el tipo de identificacion de la persona.\', DESCRICION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica el tipo de identificacion de la persona.
        1. Cedula de ciudadania.
        2. Cedula de extrangeria.
        3. Tarjeta de identidad.
        4. Pasaporte.
        5. NIT.\', PRIMARY KEY(TIPO_ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tipo_de_usuario (TIPO_USUARIO VARCHAR(1) NOT NULL COLLATE latin1_swedish_ci COMMENT \'
        Campo que indica el tipo de usuario de la persona.\', DESCRIPCION VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica el tipo de usuario de la persona.
        A = ACTIVO
        R = RETIRADO
        I = INACTIVO\', PRIMARY KEY(TIPO_USUARIO)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE usuario (CODIGO INT NOT NULL COMMENT \'Campo que indica el codigo guardado en la base de datos, para facilitar consultas.\', ID VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci COMMENT \'
        Campo que indica el numero de identificacion de la persona.\', TIPO_ID INT NOT NULL COMMENT \'
        Campo que indica el tipo de identificacion de la persona.
        1. Cedula de ciudadania.
        2. Cedula de extrangeria.
        3. Tarjeta de identidad.
        4. Pasaporte.
        5. NIT.\', NOMBRE VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica los nombres de la persona.\', APELLIDO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica los apellidos de la persona.\', PASS VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Campo que indica la contraseña de la persona.\', PRIMER_INGRESO TINYINT(1) DEFAULT \'0\' NOT NULL COMMENT \'
        Campo que indica si el usuario acepto los terminos y condiciones, para pasar a la paguina de inicio.
        0 = INHABILITADO
        1= HABILITADO
        Por defecto es 0\', TIPO_USUARIO VARCHAR(1) NOT NULL COLLATE latin1_swedish_ci, CODIGO_ASOCIADO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'
        Campo que indica el numero de asociado de la persona.\', ULTIMO_INGRESO DATE NOT NULL COMMENT \'Campo que indica la ultima fecha que el usuario estuvo dentro de la aplicacion.\', USUARIO_WEB TINYINT(1) DEFAULT \'0\' NOT NULL COMMENT \'Campo que indica si esta habilitado para ingresar al back end de configuración de la aplicación.
        0 = INHABILITADO
        1= HABILITADO
        Por defecto es 0\', INDEX fk_USUARIO_TIPO_DE_IDENTIFICACION_idx (TIPO_ID), INDEX fk_USUARIO_TIPO_DE_USUARIO1_idx (TIPO_USUARIO), PRIMARY KEY(CODIGO)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE usuario_has_menu_back_end (MENU_BACK_END_ID INT NOT NULL, USUARIO_CODIGO INT NOT NULL, INDEX fk_USUARIO_has_MENU_BACK_END_USUARIO1_idx (USUARIO_CODIGO), INDEX fk_USUARIO_has_MENU_BACK_END_MENU_BACK_END1_idx (MENU_BACK_END_ID), PRIMARY KEY(MENU_BACK_END_ID, USUARIO_CODIGO)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE usuario_web (ID INT AUTO_INCREMENT NOT NULL COMMENT \'Llave primaria de la tabla es autoincrementable\', USUARIO VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci COMMENT \'Usuario de \', CONTRASENA VARCHAR(250) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ciudad ADD CONSTRAINT fk_CIUDAD_DEPARTAMENTO1 FOREIGN KEY (DEPARTAMENTO_ID) REFERENCES departamento (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE dispositivos ADD CONSTRAINT fk_DISPOSITIVOS_USUARIO1 FOREIGN KEY (USUARIO_CODIGO) REFERENCES usuario (CODIGO) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE encuestas ADD CONSTRAINT fk_ENCUESTAS_ESTADO1 FOREIGN KEY (ESTADO_ID) REFERENCES estado (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE menu_back_end ADD CONSTRAINT fk_MENU_BACK_END_ESTADO1 FOREIGN KEY (ESTADO) REFERENCES estado (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT fk_NOTIFICACIONES_USUARIO1 FOREIGN KEY (USUARIO_CODIGO) REFERENCES usuario (CODIGO) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE oficina_convenio ADD CONSTRAINT fk_OFICINA_CONVENIO_CIUDAD1 FOREIGN KEY (CIUDAD_ID) REFERENCES ciudad (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE oficina_convenio ADD CONSTRAINT fk_OFICINA_CONVENIO_CONVENIO1 FOREIGN KEY (CONVENIO_ID) REFERENCES convenio (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE oficinas ADD CONSTRAINT fk_OFICINAS_CIUDAD1 FOREIGN KEY (CIUDAD_ID) REFERENCES ciudad (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE posibles_respuestas ADD CONSTRAINT fk_POSIBLES_RESPUESTAS_PREGUNTA_ENCUESTA1 FOREIGN KEY (PREGUNTA_ENCUESTA_ID) REFERENCES pregunta_encuesta (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE pregunta_encuesta ADD CONSTRAINT fk_PREGUNTA_ENCUESTA_ENCUESTAS1 FOREIGN KEY (ENCUESTAS_ID) REFERENCES encuestas (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE respuestas ADD CONSTRAINT fk_RESPUESTAS_POSIBLES_RESPUESTAS1 FOREIGN KEY (POSIBLES_RESPUESTAS_ID) REFERENCES posibles_respuestas (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE solicitud_productos ADD CONSTRAINT fk_SELECCION_PRODUCTOS_ESTADO1 FOREIGN KEY (ESTADO_ID) REFERENCES estado (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT fk_USUARIO_TIPO_DE_IDENTIFICACION0 FOREIGN KEY (TIPO_ID) REFERENCES tipo_de_identificacion (TIPO_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT fk_USUARIO_TIPO_DE_USUARIO1 FOREIGN KEY (TIPO_USUARIO) REFERENCES tipo_de_usuario (TIPO_USUARIO) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE usuario_has_menu_back_end ADD CONSTRAINT fk_USUARIO_has_MENU_BACK_END_MENU_BACK_END1 FOREIGN KEY (MENU_BACK_END_ID) REFERENCES menu_back_end (ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE usuario_has_menu_back_end ADD CONSTRAINT fk_USUARIO_has_MENU_BACK_END_USUARIO1 FOREIGN KEY (USUARIO_CODIGO) REFERENCES usuario (CODIGO) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE user');
    }
}
