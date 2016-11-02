<?php
namespace Mwltr\BackendWidgetApplicationMode\Block\Admin;

use Magento\Backend\Block\Template;
use Magento\Framework\App\DeploymentConfig as AppDeploymentConfig;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\State as AppState;

class ApplicationMode extends Template
{
    /**
     * @var AppDeploymentConfig
     */
    private $deploymentConfig;

    /**
     * @var DirectoryList
     */
    private $directoryList;

    /**
     * ApplicationMode constructor.
     *
     * @param AppDeploymentConfig $deploymentConfig
     * @param Template\Context    $context
     * @param DirectoryList       $directoryList
     * @param array               $data
     */
    public function __construct(
        AppDeploymentConfig $deploymentConfig,
        Template\Context $context,
        DirectoryList $directoryList,
        array $data
    ) {
        parent::__construct($context, $data);
        $this->deploymentConfig = $deploymentConfig;
        $this->directoryList = $directoryList;
    }

    /**
     * @return mixed|null
     */
    public function getApplicationMode()
    {
        return $this->deploymentConfig->get(AppState::PARAM_MODE);
    }

    /**
     * @return string
     */
    public function getShopVersion()
    {
        $path = $this->directoryList->getPath('etc');
        $path .= DIRECTORY_SEPARATOR . 'version.txt';

        if (!file_exists($path) || !is_readable($path)) {
            return '';
        }

        return file_get_contents($path);
    }
}
