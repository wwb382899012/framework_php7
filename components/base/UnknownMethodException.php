<?php
/**
 * Created by youyi000.
 * DateTime: 2018/4/8 9:48
 * Describe：
 */

namespace system\components\base;


class UnknownMethodException extends \BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Method';
    }
}