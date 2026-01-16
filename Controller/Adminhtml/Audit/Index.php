<?php
/**
 * Admin Controller - Audit Log Grid
 *
 * @category  Ashokdubariya
 * @package   Ashokdubariya_LoginAsCustomer
 */
declare(strict_types=1);

namespace Ashokdubariya\LoginAsCustomer\Controller\Adminhtml\Audit;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 *
 * Displays audit log grid in admin panel
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level constant
     */
    const ADMIN_RESOURCE = 'Ashokdubariya_LoginAsCustomer::audit_log';

    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute action
     *
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Ashokdubariya_LoginAsCustomer::audit_log');
        $resultPage->getConfig()->getTitle()->prepend(__('Login as Customer - Audit Log'));

        return $resultPage;
    }
}
