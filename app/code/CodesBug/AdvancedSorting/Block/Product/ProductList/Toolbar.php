<?php
/**
 * Class Toolbar
 *
 * PHP version 7
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
namespace CodesBug\AdvancedSorting\Block\Product\ProductList;

/**
 * Class Toolbar
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar
{
    /**
     * Set collection to sorting option
     *
     * @param \Magento\Framework\Data\Collection $collection
     *
     * @return $this
     */
    public function setCollection($collection)
    {
        $this->_collection = $collection;
        $this->_collection->setCurPage($this->getCurrentPage());

        $limit = (int) $this->getLimit();
        if ($limit) {
            $this->_collection->setPageSize($limit);
        }

        if ($this->getCurrentOrder()) {
            switch ($this->getCurrentOrder()) {
                case 'position':
                    $this->_collection->addAttributeToSort(
                        $this->getCurrentOrder(),
                        $this->getCurrentDirection()
                    );
                    break;
                case 'best_seller':
                    $this->_collection->getSelect()->joinLeft(
                        'sales_order_item',
                        'e.entity_id = sales_order_item.product_id',
                        ['qty_ordered' => 'SUM(sales_order_item.qty_ordered)']
                    )
                        ->group('e.entity_id')
                        ->order('qty_ordered ' . $this->getCurrentDirectionReverse());
                    break;
                case 'top_rated':
                    $this->_collection->getSelect()->joinLeft(
                        'review_entity_summary',
                        'e.entity_id = review_entity_summary.entity_pk_value',
                        ['toprated' => 'review_entity_summary.rating_summary']
                    )
                        ->group('e.entity_id')
                        ->order('toprated ' . $this->getCurrentDirectionReverse());
                    break;
                case 'new_arrivals':
                    $this->_collection
                        ->getSelect()
                        ->order('e.created_at ' . $this->getCurrentDirection());
                    break;
                case 'most_viewed':
                    $this->_collection->getSelect()->joinLeft(
                        'report_viewed_product_index',
                        'e.entity_id = report_viewed_product_index.product_id',
                        ['visit_count' => 'COUNT(report_viewed_product_index.product_id)']
                    )
                        ->group('e.entity_id')
                        ->order('visit_count ' . $this->getCurrentDirectionReverse());
                    break;
                case 'review_count':
                    $this->_collection->getSelect()->joinLeft(
                        'review_entity_summary',
                        'e.entity_id = review_entity_summary.entity_pk_value ',
                        ['reviewcount' => 'review_entity_summary.reviews_count']
                    )
                        ->group('e.entity_id')
                        ->order('reviewcount ' . $this->getCurrentDirectionReverse());
                    break;
                case 'low_to_high_price':
                    $this->_collection->setOrder('price', 'asc');
                    break;
                case 'high_to_low_price':
                    $this->_collection->setOrder('price', 'desc');
                    break;
                default:
                    $this->_collection->setOrder($this->getCurrentOrder(), $this->getCurrentDirection());
                    break;
            }
        }

        return $this;
    }

    /**
     * Return Reverse direction of current direction
     *
     * @return string
     */
    public function getCurrentDirectionReverse()
    {
        if ($this->getCurrentDirection() == 'asc') {
            return 'desc';
        } elseif ($this->getCurrentDirection() == 'desc') {
            return 'asc';
        } else {
            return $this->getCurrentDirection();
        }
    }
}
