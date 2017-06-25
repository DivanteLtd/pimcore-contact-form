<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */

/**
 * Class ContactForm_AdminController
 */
class ContactForm_AdminController extends \Pimcore\Controller\Action\Admin
{
    /**
     * Index Action - saves config
     */
    public function indexAction()
    {
        $configHelper = new \ContactForm\Helper\Config();
        $config = $configHelper->getConfig();
        $email = $this->getParam("email");
        if ($email) {
            $config->email = $email;
            $configHelper->setConfig($config);
        }
        $this->view->email = $config->email;
    }
}
