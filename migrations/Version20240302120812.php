<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302120812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE annulations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cars_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE costs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE feedbacks_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE itineraries_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE places_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rapports_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sessions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trips_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE address (id INT NOT NULL, city_id INT DEFAULT NULL, rue VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4E6F818BAC62AF ON address (city_id)');
        $this->addSql('COMMENT ON COLUMN address.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN address.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE annulations (id INT NOT NULL, place_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, raison VARCHAR(255) DEFAULT NULL, date_annulation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F1D9E74FDA6A219 ON annulations (place_id)');
        $this->addSql('CREATE INDEX IDX_F1D9E74FB83297E7 ON annulations (reservation_id)');
        $this->addSql('COMMENT ON COLUMN annulations.date_annulation IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN annulations.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN annulations.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE cars (id INT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, registration VARCHAR(160) NOT NULL, capacity INT NOT NULL, speed_kph INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN cars.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN cars.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE cities (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN cities.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN cities.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE costs (id INT NOT NULL, adult BIGINT NOT NULL, children BIGINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN costs.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN costs.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE feedbacks (id INT NOT NULL, person_id INT DEFAULT NULL, comment TEXT DEFAULT NULL, note INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7E6C3F89217BBB47 ON feedbacks (person_id)');
        $this->addSql('COMMENT ON COLUMN feedbacks.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN feedbacks.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE itineraries (id INT NOT NULL, cost_id INT DEFAULT NULL, departure VARCHAR(255) NOT NULL, arrival VARCHAR(255) NOT NULL, distance DOUBLE PRECISION NOT NULL, duration BIGINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E69D0F6C1DBF857F ON itineraries (cost_id)');
        $this->addSql('COMMENT ON COLUMN itineraries.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN itineraries.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE payments (id INT NOT NULL, reservation_id INT DEFAULT NULL, amount BIGINT NOT NULL, payment_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, method_payment VARCHAR(255) NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_65D29B32B83297E7 ON payments (reservation_id)');
        $this->addSql('COMMENT ON COLUMN payments.payment_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN payments.create_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN payments.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE places (id INT NOT NULL, car_id INT DEFAULT NULL, place_number INT NOT NULL, description VARCHAR(255) DEFAULT NULL, is_free BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FEAF6C55C3C6F69F ON places (car_id)');
        $this->addSql('COMMENT ON COLUMN places.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN places.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE rapports (id INT NOT NULL, rapport_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN rapports.rapport_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN rapports.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN rapports.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE reservations (id INT NOT NULL, person_id INT DEFAULT NULL, trip_id INT DEFAULT NULL, place_id INT DEFAULT NULL, reservation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, children INT DEFAULT NULL, adult INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4DA239217BBB47 ON reservations (person_id)');
        $this->addSql('CREATE INDEX IDX_4DA239A5BC2E0E ON reservations (trip_id)');
        $this->addSql('CREATE INDEX IDX_4DA239DA6A219 ON reservations (place_id)');
        $this->addSql('COMMENT ON COLUMN reservations.reservation_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN reservations.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN reservations.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE roles (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN roles.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN roles.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE sessions (id INT NOT NULL, person_id INT DEFAULT NULL, token TEXT DEFAULT NULL, expiration_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9A609D13217BBB47 ON sessions (person_id)');
        $this->addSql('COMMENT ON COLUMN sessions.expiration_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN sessions.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN sessions.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE trips (id INT NOT NULL, itinerary_id INT DEFAULT NULL, destination VARCHAR(255) NOT NULL, trip_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AA7370DA15F737B2 ON trips (itinerary_id)');
        $this->addSql('COMMENT ON COLUMN trips.trip_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, address_id INT DEFAULT NULL, car_id INT DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1483A5E9F5B7AF75 ON users (address_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9C3C6F69F ON users (car_id)');
        $this->addSql('COMMENT ON COLUMN users.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN users.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('CREATE TABLE user_rapport (user_id INT NOT NULL, rapport_id INT NOT NULL, PRIMARY KEY(user_id, rapport_id))');
        $this->addSql('CREATE INDEX IDX_E639BE96A76ED395 ON user_rapport (user_id)');
        $this->addSql('CREATE INDEX IDX_E639BE961DFBCC46 ON user_rapport (rapport_id)');
        $this->addSql('CREATE TABLE user_trip (user_id INT NOT NULL, trip_id INT NOT NULL, PRIMARY KEY(user_id, trip_id))');
        $this->addSql('CREATE INDEX IDX_CD7B9F2A76ED395 ON user_trip (user_id)');
        $this->addSql('CREATE INDEX IDX_CD7B9F2A5BC2E0E ON user_trip (trip_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE annulations ADD CONSTRAINT FK_F1D9E74FDA6A219 FOREIGN KEY (place_id) REFERENCES places (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE annulations ADD CONSTRAINT FK_F1D9E74FB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservations (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE feedbacks ADD CONSTRAINT FK_7E6C3F89217BBB47 FOREIGN KEY (person_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE itineraries ADD CONSTRAINT FK_E69D0F6C1DBF857F FOREIGN KEY (cost_id) REFERENCES costs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservations (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C55C3C6F69F FOREIGN KEY (car_id) REFERENCES cars (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239217BBB47 FOREIGN KEY (person_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trips (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239DA6A219 FOREIGN KEY (place_id) REFERENCES places (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D13217BBB47 FOREIGN KEY (person_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trips ADD CONSTRAINT FK_AA7370DA15F737B2 FOREIGN KEY (itinerary_id) REFERENCES itineraries (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C3C6F69F FOREIGN KEY (car_id) REFERENCES cars (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_rapport ADD CONSTRAINT FK_E639BE96A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_rapport ADD CONSTRAINT FK_E639BE961DFBCC46 FOREIGN KEY (rapport_id) REFERENCES rapports (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_trip ADD CONSTRAINT FK_CD7B9F2A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_trip ADD CONSTRAINT FK_CD7B9F2A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trips (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE annulations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cars_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE costs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE feedbacks_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE itineraries_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE places_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rapports_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sessions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trips_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('ALTER TABLE address DROP CONSTRAINT FK_D4E6F818BAC62AF');
        $this->addSql('ALTER TABLE annulations DROP CONSTRAINT FK_F1D9E74FDA6A219');
        $this->addSql('ALTER TABLE annulations DROP CONSTRAINT FK_F1D9E74FB83297E7');
        $this->addSql('ALTER TABLE feedbacks DROP CONSTRAINT FK_7E6C3F89217BBB47');
        $this->addSql('ALTER TABLE itineraries DROP CONSTRAINT FK_E69D0F6C1DBF857F');
        $this->addSql('ALTER TABLE payments DROP CONSTRAINT FK_65D29B32B83297E7');
        $this->addSql('ALTER TABLE places DROP CONSTRAINT FK_FEAF6C55C3C6F69F');
        $this->addSql('ALTER TABLE reservations DROP CONSTRAINT FK_4DA239217BBB47');
        $this->addSql('ALTER TABLE reservations DROP CONSTRAINT FK_4DA239A5BC2E0E');
        $this->addSql('ALTER TABLE reservations DROP CONSTRAINT FK_4DA239DA6A219');
        $this->addSql('ALTER TABLE sessions DROP CONSTRAINT FK_9A609D13217BBB47');
        $this->addSql('ALTER TABLE trips DROP CONSTRAINT FK_AA7370DA15F737B2');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9F5B7AF75');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9C3C6F69F');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3A76ED395');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3D60322AC');
        $this->addSql('ALTER TABLE user_rapport DROP CONSTRAINT FK_E639BE96A76ED395');
        $this->addSql('ALTER TABLE user_rapport DROP CONSTRAINT FK_E639BE961DFBCC46');
        $this->addSql('ALTER TABLE user_trip DROP CONSTRAINT FK_CD7B9F2A76ED395');
        $this->addSql('ALTER TABLE user_trip DROP CONSTRAINT FK_CD7B9F2A5BC2E0E');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE annulations');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE costs');
        $this->addSql('DROP TABLE feedbacks');
        $this->addSql('DROP TABLE itineraries');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP TABLE rapports');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE sessions');
        $this->addSql('DROP TABLE trips');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('DROP TABLE user_rapport');
        $this->addSql('DROP TABLE user_trip');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
