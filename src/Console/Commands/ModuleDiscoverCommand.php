<?php

namespace B2B\Console\Commands;

use B2B\Contracts\ModuleIntarface;
use hanneskod\classtools\Iterator\ClassIterator;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\PackageManifest;
use Symfony\Component\Finder\Finder;

class ModuleDiscoverCommand extends Command
{
    protected $signature = 'b2b:module:discover';

    public function handle(Filesystem $filesystem, PackageManifest $packageManifest): void
    {
        $path = __DIR__.'/../..';

        $finder = new Finder();
        $iter = new ClassIterator($finder->in($path));

        $iter->enableAutoloading();
        $providers = [];

        /** @var \ReflectionClass $class */
        foreach ($iter as $class) {
            if (!in_array(ModuleIntarface::class, class_implements($class->getName()))) {
                continue;
            }

            $providers[strtolower($class->getNamespaceName())] = [
                'providers' => $class->getName(),
            ];
        }

        $manifest = array_merge($packageManifest->manifest, $providers);

        $filesystem->replace(
            $packageManifest->manifestPath, '<?php return '.var_export($manifest, true).';'
        );
    }
}
