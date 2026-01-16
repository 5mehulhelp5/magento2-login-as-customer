<?php
/**
 * Audit Log Collection
 *
 * @category  Ashokdubariya
 * @package   Ashokdubariya_LoginAsCustomer
 */
declare(strict_types=1);

namespace Ashokdubariya\LoginAsCustomer\Model\ResourceModel\AuditLog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Ashokdubariya\LoginAsCustomer\Model\AuditLog;
use Ashokdubariya\LoginAsCustomer\Model\ResourceModel\AuditLog as AuditLogResource;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(AuditLog::class, AuditLogResource::class);
    }
}
