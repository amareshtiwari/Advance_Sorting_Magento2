<?php
/**
 * Class ProductCollection
 *
 * PHP version 7
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
namespace CodesBug\AdvancedSorting\Plugin;

/**
 * Class ProductCollection
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
class ProductCollection
{
    /**
     * Reset Group select after get select column sql
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $subject
     * @param \Magento\Framework\DB\Select                            $result
     *
     * @return mixed
     */
    public function afterGetSelectCountSql($subject, $result)
    {
        if (count($result->getPart(\Zend_Db_Select::GROUP)) > 0) {
            $result->reset(\Zend_Db_Select::GROUP);
        }
        return $result;
    }
}
