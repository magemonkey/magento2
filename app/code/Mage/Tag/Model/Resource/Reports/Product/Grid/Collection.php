<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Tag
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Report Products Tags grid collection
 *
 * @category    Mage
 * @package     Mage_Tag
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Tag_Model_Resource_Reports_Product_Grid_Collection extends Mage_Tag_Model_Resource_Reports_Product_Collection
{
    /**
     * @var Mage_Tag_Model_Tag
     */
    protected $_model;

    /**
     * @param Varien_Data_Collection_Db_FetchStrategyInterface $fetchStrategy
     * @param Mage_Tag_Model_Tag $tagModel
     */
    public function __construct(
        Varien_Data_Collection_Db_FetchStrategyInterface $fetchStrategy,
        Mage_Tag_Model_Tag $tagModel
    ) {
        $this->_model = $tagModel;
        parent::__construct($fetchStrategy);
    }

    /**
     * @return Mage_Tag_Model_Resource_Product_Collection|void
     */
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->addUniqueTagedCount()
            ->addAllTagedCount()
            ->addStatusFilter($this->_model->getApprovedStatus())
            ->addGroupByProduct();
        return $this;

    }
}
