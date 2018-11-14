<?php
/**
 * Created by youyi000.
 * DateTime: 2018/4/8 9:51
 * Describe：
 */

namespace system\components\base;


class UnknownPropertyException extends \Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Property';
    }
}