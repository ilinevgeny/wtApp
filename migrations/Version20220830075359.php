<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830075359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create a sensor table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
            CREATE TABLE sensor (
                id SERIAL PRIMARY KEY NOT NULL,
                uuid VARCHAR(255) NOT NULL,
                ip VARCHAR(45) NOT NULL               
            )
            SQL
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE sensor');
    }
}
