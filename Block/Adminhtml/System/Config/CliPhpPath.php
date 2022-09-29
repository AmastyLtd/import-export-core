<?php
declare(strict_types=1);

namespace Amasty\ImportExportCore\Block\Adminhtml\System\Config;

use Amasty\ImportExportCore\Utils\CliPhpResolver;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\UrlInterface;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;

class CliPhpPath extends Field
{
    /**
     * @var CliPhpResolver
     */
    private $cliPhpResolver;

    public function __construct(
        Context $context,
        CliPhpResolver $cliPhpResolver
    ) {
        parent::__construct($context);
        $this->cliPhpResolver = $cliPhpResolver;
    }

    public function render(AbstractElement $element)
    {
        try {
            $phpPath = $this->cliPhpResolver->getExecutablePath();
        } catch (\Exception $e) {
            $phpPath = '';
        }
        $element->setText($phpPath);

        return parent::render($element);
    }
}
