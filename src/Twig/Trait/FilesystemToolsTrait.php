<?php

/*
 * This file is part of the Mezcalito UX FileManager project.
 *
 * (c) Mezcalito <dev@mezcalito.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mezcalito\FileManagerBundle\Twig\Trait;

use Mezcalito\FileManagerBundle\Factory\FilesystemFactory;
use Mezcalito\FileManagerBundle\Filesystem\Filesystem;
use Symfony\Contracts\Service\Attribute\Required;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait FilesystemToolsTrait
{
    #[LiveProp]
    public string $storage;

    public ?Filesystem $filesystem = null;

    private ?FilesystemFactory $factory = null;

    #[ExposeInTemplate]
    public function getFilesystem(): Filesystem
    {
        if (null === $this->filesystem) {
            $this->filesystem = $this->factory->get($this->storage);
        }

        return $this->filesystem;
    }

    #[Required]
    public function setFilesystemFactory(FilesystemFactory $factory): void
    {
        $this->factory = $factory;
    }
}
