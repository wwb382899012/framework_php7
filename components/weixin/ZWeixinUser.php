<?php
/**
 * Created by youyi000.
 * DateTime: 2017/11/9 17:20
 * Describe：
 */

Mod::import("system.components.weixin.ZBaseWeixinCorp");

class ZWeixinUser extends ZBaseWeixinCorp
{
    /**
     * 创建用户
     * @param $params
     * @return bool
     */
    public function create($params)
    {
        try
        {
            $ret=$this->post('user', 'create', $params);
            $res = json_decode($ret);

            if ($res->errcode != 0)
            {
                Mod::log(sprintf('Weixin user create error, the result is: %s, the params is: %s', $ret, json_encode($params)), 'error');
                //throw new BusinessException('新增用户失败');
                return false;
            }
            return true;
        }
        catch (Exception $e)
        {
            Mod::log("Weixin user create error: ".$e->getMessage().", the params is: ".json_encode($params),"error");
            return false;
        }

    }

    /**
     * 更新用户信息
     * @param $userId
     * @param $params
     * @return bool
     */
    public function update($userId,$params)
    {
        if(!is_array($params) || count($params)<1)
            return false;

        $params["userid"]=$userId;

        try
        {
            $ret=$this->post('user', 'update', $params);
            $res = json_decode($ret);

            if ($res->errcode != 0)
            {
                Mod::log(sprintf('Weixin user update error, the result is: %s, the params is: %s', $ret, json_encode($params)), 'error');
                return false;
            }
            return true;
        }
        catch (Exception $e)
        {
            Mod::log("Weixin user update error: ".$e->getMessage().", the params is: ".json_encode($params),"error");
            return false;
        }
    }

    /**
     * 删除用户
     * @param $userId
     * @return bool
     */
    public function delete($userId)
    {
        try
        {
            $param="userid=".$userId;
            $res=$this->get('user', 'delete', $param);
            $res = json_decode($res);
            if ($res->errcode != 0)
            {
                Mod::log(sprintf('Weixin user delete error, the code is: %s, the message is: %s, the params is: %s', $res->errorcode, $res->errormsg,$param), 'error');
                return false;
            }
            return true;
        }
        catch (Exception $e)
        {
            Mod::log("Weixin delete update error: ".$e->getMessage().", the params is: ".$param,"error");
            return false;
        }
    }
}