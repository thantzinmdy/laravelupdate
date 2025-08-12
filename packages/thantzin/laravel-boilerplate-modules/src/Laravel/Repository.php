<?php

namespace Thantzin\Modules\Laravel;

use Thantzin\Modules\Json;
use Thantzin\Modules\Repository as BaseRepository;

class Repository extends BaseRepository
{
    /**
     * {@inheritdoc}
     */
    protected function createModule(...$args)
    {
        return new Module(...$args);
    }
}
