<?php
declare(strict_types=1);

namespace Threecommerce\Base\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;

class PluginList extends Template
{
    protected $storeManager;

    public function __construct(
        Context $context,
        array   $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function getPlugins()
    {
        $contextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        return json_decode(file_get_contents('https://www.threecommerce.it/listplugin.json', false, stream_context_create($contextOptions)));
    }
}
