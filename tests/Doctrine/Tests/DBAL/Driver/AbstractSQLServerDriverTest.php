<?php

declare(strict_types=1);

namespace Doctrine\Tests\DBAL\Driver;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\AbstractSQLServerDriver;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;
use Doctrine\DBAL\Platforms\SQLServerPlatform;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\SQLServerSchemaManager;

class AbstractSQLServerDriverTest extends AbstractDriverTest
{
    protected function createDriver() : Driver
    {
        return $this->getMockForAbstractClass(AbstractSQLServerDriver::class);
    }

    protected function createPlatform() : AbstractPlatform
    {
        return new SQLServerPlatform();
    }

    protected function createSchemaManager(Connection $connection) : AbstractSchemaManager
    {
        return new SQLServerSchemaManager($connection);
    }

    /**
     * {@inheritDoc}
     */
    protected function getDatabasePlatformsForVersions() : array
    {
        return [
            ['10', SQLServerPlatform::class],
            ['10.00', SQLServerPlatform::class],
            ['10.00.0', SQLServerPlatform::class],
            ['10.00.1599', SQLServerPlatform::class],
            ['10.00.1599.99', SQLServerPlatform::class],
            ['10.00.1600', SQLServerPlatform::class],
            ['10.00.1600.0', SQLServerPlatform::class],
            ['10.00.1600.99', SQLServerPlatform::class],
            ['10.00.1601', SQLServerPlatform::class],
            ['10.10', SQLServerPlatform::class],
            ['10.10.9999', SQLServerPlatform::class],
            ['11.00.2099', SQLServerPlatform::class],
            ['11.00.2099.99', SQLServerPlatform::class],
            ['11.00.2100', SQLServer2012Platform::class],
            ['11.00.2100.0', SQLServer2012Platform::class],
            ['11.00.2100.99', SQLServer2012Platform::class],
            ['11.00.2101', SQLServer2012Platform::class],
            ['12', SQLServer2012Platform::class],
        ];
    }
}
