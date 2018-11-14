<?php
/**
 * Created by youyi000.
 * DateTime: 2018/10/15 17:14
 * Describe：
 */

class CMSApplication extends CWebApplication
{
    public function processRequest()
    {

    }

    public function run()
    {
        if($this->hasEventHandler('onBeginRequest'))
            $this->onBeginRequest(new CEvent($this));
        register_shutdown_function(array($this,'end'),0,false);
        $this->processRequest();
        /*if($this->hasEventHandler('onEndRequest'))
            $this->onEndRequest(new CEvent($this));*/
    }


}