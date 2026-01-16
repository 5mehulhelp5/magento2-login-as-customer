<?php
/**
 * Audit Log Resource Model
 *
 * @category  Ashokdubariya
 * @package   Ashokdubariya_LoginAsCustomer
 */
declare(strict_types=1);

namespace Ashokdubariya\LoginAsCustomer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class AuditLog Resource Model
 */
class AuditLog extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ashokdubariya_login_as_customer_log', 'entity_id');
    }
}
