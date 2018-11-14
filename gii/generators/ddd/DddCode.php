<?php
/**
 * Created by youyi000.
 * DateTime: 2018/8/15 20:19
 * Describe：
 */

class DddCode extends CCodeModel
{
    public $context="";
    public $entity="";
    /**
     * 实体目录名
     * @var string
     */
    public $entityFolderName="";

    /**
     * ddd位置
     * @var string
     */
    public $dddPath='application.ddd';
    public $baseEntity="ddd\Common\Domain\BaseEntity";
    public $iRepository="ddd\Common\Domain\IRepository";
    public $iAggregateRoot="ddd\Common\IAggregateRoot";

    public $baseRepository="ddd\Common\Repository\EntityRepository";
    public $baseRepositoryShortName;
    public $namespacePrefix="ddd";

    /**
     * 仓储接口的基础类名
     * @var string
     */
    public $iRepositoryShortName;

    /**
     * @var string
     */
    public $iAggregateRootShortName;

    /**
     * 实体基类的基础类名
     * @var string
     */
    public $baseEntityShortName;


    /**
     * 实体的命名空间前缀
     * @var
     */
    public $entityNamespace;

    protected $_namespaces=[];

    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('context,namespacePrefix,entityFolderName,dddPath, entity, baseEntity,iRepository,iAggregateRoot,baseRepository', 'filter', 'filter' => 'trim'),
        ));
    }
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'context'=>'上下文名称',
            'entity'=>'实体名',
            'dddPath'=>'ddd位置',
            'namespacePrefix'=>'ddd命名空间',
            'entityFolderName'=>'实体目录名',
            'iAggregateRoot'=>'聚合根接口',
            'baseEntity'=>'实体基类',
            'iRepository'=>'仓储接口',
            'baseRepository'=>'仓储基类',
        ));
    }

    /**
     * 获取类的命名空间
     * @param $className
     * @return mixed|string
     * @throws ReflectionException
     */
    /*public function getNamespace($className)
    {
        if(empty($className))
            return "";
        if(isset($this->_namespaces[$className]))
            return $this->_namespaces[$className];

        $class = new \ReflectionClass($className);
        return $this->_namespaces[$className]=$class->getNamespaceName();
    }*/

    /**
     * 获取基础类名
     * @param $className
     * @return string
     */
    public function getShortClassName($className)
    {
        if(empty($className))
            return "";
        $n=strripos($className,"\\");
        if($n===false)
            return $className;
        return substr($className,$n+1);
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.

        $this->files=array();
        $fileConfigs=$this->getFileConfigs();

        $params=array(
            'context'=>$this->context,
            'entity'=>$this->entity,
            //"isAggregateRoot"=>$this->isAggregateRoot,
            "namespace"=>""
        );
        $this->entityNamespace=$this->namespacePrefix."\\".$this->context."\\Domain\\".$this->entityFolderName;

        $this->iRepositoryShortName=$this->getShortClassName($this->iRepository);
        $this->baseEntityShortName=$this->getShortClassName($this->baseEntity);
        $this->iAggregateRootShortName=$this->getShortClassName($this->iAggregateRoot);
        $this->baseRepositoryShortName=$this->getShortClassName($this->baseRepository);

        foreach ($fileConfigs as $file)
        {
            $params["namespace"]=$file["namespace"];
            $this->files[]=new CCodeFile(
                $file["path"],
                $this->render($file["template"],$params)
            );
        }

    }

    protected function getFileConfigs()
    {
        $basePath=Mod::getPathOfAlias($this->dddPath);
        $templatePath=$this->templatePath;
        return [
            "entity"=>[
                "template"=>$templatePath.DIRECTORY_SEPARATOR."entity.php",
                "path"=>$basePath.'/'.$this->context.'/Domain/'.$this->entityFolderName.'/'.$this->entity.'.php',
                "namespace"=>$this->namespacePrefix."\\".$this->context."\\Domain\\".$this->entityFolderName,
            ],
            "iRepository"=>[
                "template"=>$templatePath.DIRECTORY_SEPARATOR."IRepository.php",
                "path"=>$basePath.'/'.$this->context.'/Domain/'.$this->entityFolderName.'/I'.$this->entity.'Repository.php',
                "namespace"=>$this->namespacePrefix."\\".$this->context."\\Domain\\".$this->entityFolderName,
            ],
            "traitRepository"=>[
                "template"=>$templatePath.DIRECTORY_SEPARATOR."TraitRepository.php",
                "path"=>$basePath.'/'.$this->context.'/Domain/'.$this->entityFolderName.'/'.$this->entity.'Repository.php',
                "namespace"=>$this->namespacePrefix."\\".$this->context."\\Domain\\".$this->entityFolderName,
            ],
            "repository"=>[
                "template"=>$templatePath.DIRECTORY_SEPARATOR."Repository.php",
                "path"=>$basePath.'/'.$this->context.'/Repository/'.$this->entityFolderName.'/'.$this->entity.'Repository.php',
                "namespace"=>$this->namespacePrefix."\\".$this->context."\\Repository\\".$this->entityFolderName,
            ],

        ];
    }



}