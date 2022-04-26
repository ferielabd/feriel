<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425235811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY art_boost');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY art_user');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY art_cat');
        $this->addSql('ALTER TABLE article CHANGE id_proprietaire id_proprietaire INT DEFAULT NULL, CHANGE boost boost INT DEFAULT NULL, CHANGE id_categorie id_categorie INT DEFAULT NULL, CHANGE id_Gouvernorat id_Gouvernorat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6656642768 FOREIGN KEY (boost) REFERENCES boost (id_boost)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664A22ECA4 FOREIGN KEY (id_proprietaire) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie_article (id)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY comm_pub');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY user_comm');
        $this->addSql('ALTER TABLE commentaire CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_publication id_publication INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB72EAA8E FOREIGN KEY (id_publication) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY ech_usr2');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY ech_art1');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY ech_user1');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY ech_art2');
        $this->addSql('ALTER TABLE echange CHANGE id_membre1 id_membre1 INT DEFAULT NULL, CHANGE id_membre2 id_membre2 INT DEFAULT NULL, CHANGE id_article1 id_article1 INT DEFAULT NULL, CHANGE id_article2 id_article2 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT FK_B577E3BFEEDDACFB FOREIGN KEY (id_article2) REFERENCES article (id)');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT FK_B577E3BF860C3BEA FOREIGN KEY (id_membre2) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT FK_B577E3BF77D4FD41 FOREIGN KEY (id_article1) REFERENCES article (id)');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT FK_B577E3BF1F056A50 FOREIGN KEY (id_membre1) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY cat_fav');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY user_fav');
        $this->addSql('ALTER TABLE favoris CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_categorie id_categorie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C4326B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE favoris_article DROP FOREIGN KEY fav_art');
        $this->addSql('ALTER TABLE favoris_article DROP FOREIGN KEY fav_user');
        $this->addSql('ALTER TABLE favoris_article CHANGE id_article id_article INT DEFAULT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favoris_article ADD CONSTRAINT FK_B7D0A76350EAE44 FOREIGN KEY (id_utilisateur) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE favoris_article ADD CONSTRAINT FK_B7D0A763DCA7A716 FOREIGN KEY (id_article) REFERENCES article (id)');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY message_user');
        $this->addSql('ALTER TABLE message CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE id_discussion id_discussion INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY pub_cat');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY user_pub');
        $this->addSql('ALTER TABLE publication CHANGE id_categorie id_categorie INT DEFAULT NULL, CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY ech_membre1');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY ech_rec');
        $this->addSql('ALTER TABLE reclamation CHANGE id_membre id_membre INT DEFAULT NULL, CHANGE id_echange id_echange INT DEFAULT NULL, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE Description Description VARCHAR(255) NOT NULL, CHANGE etat etat INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046BEA4ACF FOREIGN KEY (id_echange) REFERENCES echange (id_echange)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404D0834EC4 FOREIGN KEY (id_membre) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE user CHANGE rating rating DOUBLE PRECISION NOT NULL, CHANGE nb_art_ech nb_art_ech INT NOT NULL, CHANGE nb_art_pos nb_art_pos INT NOT NULL, CHANGE role role LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE vu DROP FOREIGN KEY vu_article');
        $this->addSql('ALTER TABLE vu DROP FOREIGN KEY vu_user');
        $this->addSql('ALTER TABLE vu CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE id_article id_article INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vu ADD CONSTRAINT FK_18D3493C50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE vu ADD CONSTRAINT FK_18D3493CDCA7A716 FOREIGN KEY (id_article) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6656642768');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664A22ECA4');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C9486A13');
        $this->addSql('ALTER TABLE article CHANGE boost boost INT NOT NULL, CHANGE id_proprietaire id_proprietaire INT NOT NULL, CHANGE id_categorie id_categorie INT NOT NULL, CHANGE id_Gouvernorat id_Gouvernorat INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT art_boost FOREIGN KEY (boost) REFERENCES boost (id_boost) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT art_user FOREIGN KEY (id_proprietaire) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT art_cat FOREIGN KEY (id_categorie) REFERENCES categorie_article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC6B3CA4B');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB72EAA8E');
        $this->addSql('ALTER TABLE commentaire CHANGE id_user id_user INT NOT NULL, CHANGE id_publication id_publication INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT comm_pub FOREIGN KEY (id_publication) REFERENCES publication (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT user_comm FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY FK_B577E3BFEEDDACFB');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY FK_B577E3BF860C3BEA');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY FK_B577E3BF77D4FD41');
        $this->addSql('ALTER TABLE echange DROP FOREIGN KEY FK_B577E3BF1F056A50');
        $this->addSql('ALTER TABLE echange CHANGE id_article2 id_article2 INT NOT NULL, CHANGE id_membre2 id_membre2 INT NOT NULL, CHANGE id_article1 id_article1 INT NOT NULL, CHANGE id_membre1 id_membre1 INT NOT NULL');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT ech_usr2 FOREIGN KEY (id_membre2) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT ech_art1 FOREIGN KEY (id_article1) REFERENCES article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT ech_user1 FOREIGN KEY (id_membre1) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echange ADD CONSTRAINT ech_art2 FOREIGN KEY (id_article2) REFERENCES article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C4326B3CA4B');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432C9486A13');
        $this->addSql('ALTER TABLE favoris CHANGE id_user id_user INT NOT NULL, CHANGE id_categorie id_categorie INT NOT NULL');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT cat_fav FOREIGN KEY (id_categorie) REFERENCES categorie (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT user_fav FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_article DROP FOREIGN KEY FK_B7D0A76350EAE44');
        $this->addSql('ALTER TABLE favoris_article DROP FOREIGN KEY FK_B7D0A763DCA7A716');
        $this->addSql('ALTER TABLE favoris_article CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE id_article id_article INT NOT NULL');
        $this->addSql('ALTER TABLE favoris_article ADD CONSTRAINT fav_art FOREIGN KEY (id_article) REFERENCES article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_article ADD CONSTRAINT fav_user FOREIGN KEY (id_utilisateur) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F50EAE44');
        $this->addSql('ALTER TABLE message CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE id_discussion id_discussion INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT message_user FOREIGN KEY (id_utilisateur) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779C9486A13');
        $this->addSql('ALTER TABLE publication CHANGE id_user id_user INT NOT NULL, CHANGE id_categorie id_categorie INT NOT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT pub_cat FOREIGN KEY (id_categorie) REFERENCES categorie (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT user_pub FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046BEA4ACF');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404D0834EC4');
        $this->addSql('ALTER TABLE reclamation CHANGE id_echange id_echange INT NOT NULL, CHANGE id_membre id_membre INT NOT NULL, CHANGE titre titre VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE Description Description VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE etat etat INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT ech_membre1 FOREIGN KEY (id_membre) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT ech_rec FOREIGN KEY (id_echange) REFERENCES echange (id_echange) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE rating rating DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE nb_art_ech nb_art_ech INT DEFAULT 0 NOT NULL, CHANGE nb_art_pos nb_art_pos INT DEFAULT 0 NOT NULL, CHANGE role role VARCHAR(255) DEFAULT \'membre\' NOT NULL');
        $this->addSql('ALTER TABLE vu DROP FOREIGN KEY FK_18D3493C50EAE44');
        $this->addSql('ALTER TABLE vu DROP FOREIGN KEY FK_18D3493CDCA7A716');
        $this->addSql('ALTER TABLE vu CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE id_article id_article INT NOT NULL');
        $this->addSql('ALTER TABLE vu ADD CONSTRAINT vu_article FOREIGN KEY (id_article) REFERENCES article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vu ADD CONSTRAINT vu_user FOREIGN KEY (id_utilisateur) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
