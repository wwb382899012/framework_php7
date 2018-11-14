<?php
/**
 * Created by youyi000.
 * DateTime: 2018/4/8 9:47
 * Describe：
 */

namespace system\components\base;


class InvalidCallException extends \BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Call';
    }
}