<?php

declare(strict_types=1);

namespace Lamoda\QueueBundle\Strategy\Delay;

use DateInterval;

class GeometricProgressionStrategy implements DelayStrategyInterface
{
    /** @var int */
    private $startInterval;

    /** @var float */
    private $multiplier;

    public function __construct(int $startIntervalSec, float $multiplier)
    {
        $this->startInterval = $startIntervalSec;
        $this->multiplier = $multiplier;
    }

    public function generateInterval(int $iteration): DateInterval
    {
        $newIntervalSec = $this->startInterval * ($this->multiplier ** ($iteration - 1));

        return new DateInterval('PT' . $newIntervalSec . 'S');
    }
}
