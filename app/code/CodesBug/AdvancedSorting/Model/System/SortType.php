<?php
/**
 * Class SortType
 *
 * PHP version 7
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
namespace CodesBug\AdvancedSorting\Model\System;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class SortType
 *
 * @category CodesBug
 * @package  CodesBug_AdvancedSorting
 * @author   CodesBug <codesbug@gmail.com>
 * @license  https://codesbug.blogspot.com  Open Software License (OSL 3.0)
 * @link     https://codesbug.blogspot.com
 */
class SortType implements ArrayInterface
{
    const BEST_SELLER = "best_seller";
    const TOP_RATED = "top_rated";
    const NEW_ARRIVALS = "new_arrivals";
    const MOST_VIEWED = "most_viewed";
    const REVIEW_COUNT = "review_count";
    const LOW_TO_HIGH_PRICE = "low_to_high_price";
    const HIGH_TO_LOW_PRICE = "high_to_low_price";

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->getOptionHash() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label,
            ];
        }

        return $options;
    }

    /**
     * Return options
     *
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::BEST_SELLER => __('Best Seller'),
            self::TOP_RATED => __('Top Rated'),
            self::NEW_ARRIVALS => __('New Arrivals'),
            self::LOW_TO_HIGH_PRICE => __('Low To High Price'),
            self::HIGH_TO_LOW_PRICE => __('High To Low Price'),
            self::MOST_VIEWED => __('Most Viewed'),
            self::REVIEW_COUNT => __('Review Count'),
        ];
    }
}
