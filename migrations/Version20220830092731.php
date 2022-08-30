<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830092731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create a temperature metrics table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
            CREATE TABLE temperature_metrics (
                id SERIAL PRIMARY KEY NOT NULL,
                sensor_id INT NOT NULL,
                temperature FLOAT NOT NULL,
                created_at TIMESTAMP NOT NULL,
                FOREIGN KEY (sensor_id) REFERENCES sensor (id)
            )
            SQL
        );

    }

    public function down(Schema $schema): void
    {
       $this->addSql('DROP TABLE temperature_metrics');
    }
}
