<?php
namespace Mwltr\BackendWidgetApplicationMode\Block\Admin;

use Magento\Backend\Block\Template;
use Magento\Framework\App\DeploymentConfig as AppDeploymentConfig;
use Magento\Framework\App\State as AppState;

class ApplicationMode extends Template
{
    /**
     * @var AppDeploymentConfig
     */
    private $deploymentConfig;

    /**
     * ApplicationMode constructor.
     *
     * @param AppDeploymentConfig $deploymentConfig
     * @param Template\Context    $context
     * @param array               $data
     */
    public function __construct(
        AppDeploymentConfig $deploymentConfig,
        Template\Context $context,
        array $data
    ) {
        parent::__construct($context, $data);
        $this->deploymentConfig = $deploymentConfig;
    }

    public function getApplicationMode()
    {
        return $this->deploymentConfig->get(AppState::PARAM_MODE);
    }
}
