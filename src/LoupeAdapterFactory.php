<?php

declare(strict_types=1);

/*
 * This file is part of the Schranz Search package.
 *
 * (c) Alexander Schranz <alexander@sulu.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schranz\Search\SEAL\Adapter\Loupe;

use Loupe\Loupe\LoupeFactory;
use Psr\Container\ContainerInterface;
use Schranz\Search\SEAL\Adapter\AdapterFactoryInterface;
use Schranz\Search\SEAL\Adapter\AdapterInterface;

/**
 * @experimental
 */
class LoupeAdapterFactory implements AdapterFactoryInterface
{
    public function __construct(
        private readonly ContainerInterface|null $container = null,
    ) {
    }

    public function createAdapter(array $dsn): AdapterInterface
    {
        $helper = $this->createHelper($dsn);

        return new LoupeAdapter($helper);
    }

    /**
     * @internal
     *
     * @param array{
     *     host: string,
     *     path?: string,
     * } $dsn
     */
    public function createHelper(array $dsn): LoupeHelper
    {
        /** @var LoupeFactory $loupeFactory */
        $loupeFactory = $this->container?->has(LoupeFactory::class)
            ? $this->container->get(LoupeFactory::class)
            : new LoupeFactory();

        $directory = $dsn['host'] . ($dsn['path'] ?? '');

        return new LoupeHelper(
            $loupeFactory,
            $directory,
        );
    }

    public static function getName(): string
    {
        return 'loupe';
    }
}
