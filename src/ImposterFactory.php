<?php

declare(strict_types=1);

namespace TypistTech\Imposter;

class ImposterFactory
{
    /**
     * @param string   $projectPath
     * @param string[] $extraExcludes
     *
     * @return Imposter
     */
    public static function forProject(string $projectPath, array $extraExcludes = []): Imposter
    {
        $filesystem = new Filesystem();
        $filter = new FilesystemFilter();

        $projectConfig = ConfigFactory::buildProjectConfig($projectPath . '/composer.json', $filesystem);
        $projectConfig->setExtraExcludes($extraExcludes);

        $transformer = new Transformer($projectConfig->getImposterNamespace(), $filesystem, $filter);
        $configCollection = ConfigCollectionFactory::forProject(
            $projectConfig,
            $filesystem
        );

        return new Imposter($configCollection, $transformer);
    }
}
