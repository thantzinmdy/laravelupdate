<?php

namespace Thantzin\Modules\Process;

use Thantzin\Modules\Contracts\RunableInterface;
use Thantzin\Modules\Repository;

class Runner implements RunableInterface
{
    /**
     * The module instance.
     *
     * @var \Thantzin\Modules\Repository
     */
    protected $module;

    /**
     * The constructor.
     *
     * @param \Thantzin\Modules\Repository $module
     */
    public function __construct(Repository $module)
    {
        $this->module = $module;
    }

    /**
     * Run the given command.
     *
     * @param string $command
     */
    public function run($command)
    {
        passthru($command);
    }
}
