<?php
/**
 * Status Source Model
 *
 * @category  Ashokdubariya
 * @package   Ashokdubariya_LoginAsCustomer
 */
declare(strict_types=1);

namespace Ashokdubariya\LoginAsCustomer\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Ashokdubariya\LoginAsCustomer\Model\AuditLog;

/**
 * Class Status
 *
 * Provides status options for filters and grid
 */
class Status implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => AuditLog::STATUS_PENDING, 'label' => __('Pending')],
            ['value' => AuditLog::STATUS_SUCCESS, 'label' => __('Success')],
            ['value' => AuditLog::STATUS_EXPIRED, 'label' => __('Expired')],
            ['value' => AuditLog::STATUS_FAILED, 'label' => __('Failed')]
        ];
    }
}
