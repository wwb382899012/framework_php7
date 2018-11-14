<?php echo "<?php\n"; ?>
/**
 * This is Entity Repository Interface for <?php echo $entity; ?>.
 * Auto Generated.
 * DateTime: <?php echo date("Y-m-d H:i:s")."\n"; ?>
 * Describe：
 *
 */

namespace <?php echo $namespace; ?>;

<?php if(!empty($this->iRepository)) { echo "use ".$this->iRepository.";"; }?>


/**
 * Interface I<?php echo $entity; ?>Repository
 *
 * @method <?php echo $entity; ?> findByPk($id, $condition = '', $params = array())
 * @method <?php echo $entity; ?> find($condition = '', $params = array())
 * @method <?php echo $entity; ?>[] findAll($condition = '', $params = array())
 *
 */
interface I<?php echo $entity; ?>Repository <?php if(!empty($this->iRepository)) { echo " extends ".$this->iRepositoryShortName; } ?>

{

}