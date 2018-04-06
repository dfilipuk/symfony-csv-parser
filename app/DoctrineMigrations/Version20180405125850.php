<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405125850 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE tblProductData (
          intProductDataId int(10) unsigned NOT NULL AUTO_INCREMENT,
          strProductName varchar(50) NOT NULL,
          strProductDesc varchar(255) NOT NULL,
          strProductCode varchar(10) NOT NULL,
          dtmAdded datetime DEFAULT NULL,
          dtmDiscontinued datetime DEFAULT NULL,
          stmTimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (intProductDataId),
          UNIQUE KEY (strProductCode)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT=\'Stores product data\';');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE tblProductData;');
    }
}
