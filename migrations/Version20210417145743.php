<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417145743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sign_up (id INT AUTO_INCREMENT NOT NULL, cnp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sign_up_program (sign_up_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_D8984D303146962B (sign_up_id), INDEX IDX_D8984D303EB8070A (program_id), PRIMARY KEY(sign_up_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sign_up_program ADD CONSTRAINT FK_D8984D303146962B FOREIGN KEY (sign_up_id) REFERENCES sign_up (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sign_up_program ADD CONSTRAINT FK_D8984D303EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE program ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sign_up_program DROP FOREIGN KEY FK_D8984D303146962B');
        $this->addSql('DROP TABLE sign_up');
        $this->addSql('DROP TABLE sign_up_program');
        $this->addSql('ALTER TABLE program DROP name');
    }
}
