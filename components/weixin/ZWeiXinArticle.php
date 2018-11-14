<?php
/**
 * Created by youyi000.
 * DateTime: 2018/3/6 10:21
 * Describe：
 */

class ZWeiXinArticle
{
    /**
     * 消息标题
     * @var
     */
    public $title;
    /**
     * 消息描述，可以为空
     * @var
     */
    public $description;

    /**
     * 消息URL，不得为空
     * @var
     */
    public $url;

    /**
     * 图片URL，可以为空
     * @var
     */
    public $picUrl;

    /**
     * 按钮文字，仅在图文数为1条时才生效。 默认为“阅读全文”， 不超过4个文字，超过自动截断。该设置只在企业微信上生效，微信插件上不生效。
     * @var string
     */
    public $btnTxt;

    protected $errors=array();

    public function __construct($params=null)
    {
        if(is_array($params))
        {
            foreach ($params as $k=>$v)
                $this->$k=$v;
        }
    }

    /**
     * 验证
     * @return bool
     */
    public function validate()
    {
        $this->errors=array();
        if(empty($this->title))
            $this->addError("title","标题不得为空");
        if(empty($this->url))
            $this->addError("url","链接不得为空");

        return $this->hasError();

    }

    protected function addError($name,$msg)
    {
        $this->errors[$name]=$msg;
    }

    /**
     * 是否有错误
     * @return bool
     */
    protected function hasError()
    {
        return (is_array($this->errors) && count($this->errors)>0);
    }

    /**
     * 对象转成数组
     */
    public function toArray()
    {

        $data=array(
            "title"=>$this->title,
            "url"=>$this->url,
            //"description"=>$this->description,
            //"picurl"=>$this->picUrl,
            //"btntxt"=>$this->btnTxt,
        );
        if(!empty($this->description))
            $data["description"]=$this->description;
        if(!empty($this->picurl))
            $data["picurl"]=$this->picurl;
        if(!empty($this->btntxt))
            $data["btntxt"]=$this->btntxt;
        return $data;
    }

    /**
     * 生成json字符串
     * @return string
     */
    public function toJsonString()
    {
        return json_encode($this->toArray());
    }

}