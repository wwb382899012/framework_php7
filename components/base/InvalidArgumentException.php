<?php
/**
 * Created by youyi000.
 * DateTime: 2018/4/8 10:49
 * Describe：
 */

namespace system\components\base;


class InvalidArgumentException extends \BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Parameter';
    }
}
