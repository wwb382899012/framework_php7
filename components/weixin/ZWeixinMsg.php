<?php
/**
 * Created by youyi000.
 * DateTime: 2017/11/9 17:33
 * Describe：
 */

Mod::import("system.components.weixin.ZBaseWeixinCorp");
Mod::import("system.components.weixin.ZWeiXinArticle");

class ZWeixinMsg extends ZBaseWeixinCorp
{
    /**
     * 发送文本信息
     * @param string|array $users 微信企业号中userid或userid数组
     * @param string $msg 消息内容
     * @return bool
     */
    public function sendText($users,$msg)
    {
        try
        {
            $toUser = $users;
            if (is_array($users))
                $toUser = implode('|', $users);

            if(empty($toUser))
                return false;

            $data = array('touser' => $toUser, 'msgtype' => 'text', 'agentid' => $this->agent_id, 'text' => array('content' => $msg));

            $this->doSend($data);
            return true;
        }
        catch (Exception $e)
        {
            //Mod::log("Weixin send error: ".$e->getMessage().", the users is: ".$toUser,"error");
            return false;
        }
    }

    /**
     * 进行发送操作
     * @param $data
     * @return bool
     * @throws Exception
     */
    protected function doSend($data)
    {
        $ret = $this->post('message', 'send', $data);
        $res=json_decode($ret);

        if ($res->errcode != 0)
        {
            $msg=sprintf('Weixin send error, the result: %s, the data: %s', $ret, json_encode($data));
            Mod::log($msg, 'error');
            throw new Exception($msg);
        }
        return true;
    }

    /**
     * 发送单个图文消息
     * @param $users
     * @param ZWeiXinArticle $article
     * @return bool
     */
    public function sendNews($users,ZWeiXinArticle $article)
    {
        try
        {
            $toUser = $users;
            if (is_array($users))
                $toUser = implode('|', $users);
            if(empty($toUser))
                return false;

            if(!$article->validate())
                return false;

            $news=array("articles"=>array($article->toArray()));
            $data = array('touser' => $toUser, 'msgtype' => 'news', 'agentid' => $this->agent_id, 'news' => $news);

            $this->doSend($data);
            return true;
        }
        catch (Exception $e)
        {
            //Mod::log("Weixin send error: ".$e->getMessage().", the users is: ".$toUser,"error");
            return false;
        }
    }


}