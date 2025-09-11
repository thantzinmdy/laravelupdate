<?php

namespace App\Helpers\General;

use Carbon\Carbon;

/**
 * Class Timezone.
 */
class TimezoneHelper
{
    /**
     * @param Carbon|string $date
     * @param string $format
     *
     * @return string
     */
    public function convertToLocal($date, $format = 'D M j G:i:s T Y') : string
    {
        if (is_string($date)) {
            $date = Carbon::parse($date);
        }
        
        return $date->setTimezone(auth()->user()->timezone ?? config('app.timezone'))->format($format);
    }

    /**
     * @param $date
     *
     * @return Carbon
     */
    public function convertFromLocal($date) : Carbon
    {
        return Carbon::parse($date, auth()->user()->timezone)->setTimezone('UTC');
    }
}
