<?php

declare(strict_types=1);

namespace TypistTech\Imposter;

use Codeception\Test\Unit;

/**
 * @coversDefaultClass \TypistTech\Imposter\ImposterFactory
 */
class ImposterFactoryTest extends Unit
{
    public function testForProject()
    {
        $filesystem = new Filesystem();
        $filter = new FilesystemFilter();

        $projectConfig = ConfigFactory::buildProjectConfig(codecept_data_dir('composer.json'), $filesystem);
        $configCollection = ConfigCollectionFactory::forProject($projectConfig, $filesystem);
        $transformer = new Transformer('TypistTech\Imposter\Vendor', $filesystem, $filter);

        $actual = ImposterFactory::forProject(codecept_data_dir());

        $expected = new Imposter($configCollection, $transformer);

        $this->assertEquals($expected, $actual);
    }
}
