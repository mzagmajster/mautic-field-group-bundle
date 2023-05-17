<?php

declare(strict_types=1);

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\Migrations\Exception\SkipMigration;
use Mautic\IntegrationsBundle\Migration\AbstractMigration;

final class Version_1_0_0 extends AbstractMigration
{
    private $_pTable = 'mz_fgb_field_groups';

    public function isApplicable(Schema $schema): bool
    {
        $table = $this->concatPrefix($this->_pTable);
        $shouldRunMigration = false;
        try {
            $shouldRunMigration = !$schema->getTable($table)->hasColumn('name');
        } catch(SchemaException $e) {
            $shouldRunMigration = true;
        }

        if (!$shouldRunMigration) {
            fwrite(STDERR, 'Schema includes this migration');
        }

        return $shouldRunMigration;
    }

    public function up(): void
    {
        $table = $this->concatPrefix($this->_pTable);
        $sql = "CREATE TABLE {$table} (
                id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
                is_published TINYINT(1) NOT NULL, date_added DATETIME DEFAULT NULL, 
                created_by INT DEFAULT NULL, 
                created_by_user VARCHAR(191) DEFAULT NULL, 
                date_modified DATETIME DEFAULT NULL, 
                modified_by INT DEFAULT NULL, 
                modified_by_user VARCHAR(191) DEFAULT NULL, 
                checked_out DATETIME DEFAULT NULL, 
                checked_out_by INT DEFAULT NULL, 
                checked_out_by_user VARCHAR(191) DEFAULT NULL, 
                name VARCHAR(191) NOT NULL, 
                description LONGTEXT DEFAULT NULL, 
                PRIMARY KEY(id)) 
                DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` 
                ENGINE = InnoDB ROW_FORMAT = DYNAMIC; ";
        $this->addSql($sql);
    }

    /**
     * Required because of old package: < https://github.com/doctrine/migrations/issues/1104 >
     */
    public function isTransactional(): bool
    {
        return false;
    }
}
