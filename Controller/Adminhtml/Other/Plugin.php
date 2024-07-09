<?php
declare(strict_types=1);

namespace Threecommerce\Base\Controller\Adminhtml\Other;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Plugin extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Other Plugin'));
        $resultPage->setActiveMenu('Threecommerce_Base::OtherPlugins');
        $resultPage->addBreadcrumb(__('Threecommerce'), __('Other Plugins'));
        $this->_addContent($this->_view->getLayout()->createBlock('Threecommerce\Base\Block\Adminhtml\PluginList'));
        $this->_view->renderLayout();
    }

    protected function _isAllowed()
    {
        return true;
    }
}
