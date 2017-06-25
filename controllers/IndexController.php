<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */

use \Pimcore\Model\Object\Folder as ObjectFolder;
use ContactForm\Helper\Validator;
use Pimcore\Mail;
use ContactForm\Helper\Config;

/**
 * Class ContactForm_IndexController
 */
class ContactForm_IndexController extends \Website\Controller\Action
{
    /**
     * Init plugin
     */
    public function init()
    {
        parent::init();
        $this->view->addScriptPath(PIMCORE_FRONTEND_MODULE . "/views/layouts");
        $this->view->addScriptPath(PIMCORE_FRONTEND_MODULE . "/views/scripts");
        $this->view->headLink()->appendStylesheet('/plugins/ContactForm/static/css/style.css');
        $this->view->headScript()->appendFile('/plugins/ContactForm/static/js/form.js');
    }

    /**
     * Email template action.
     */
    public function emailAction()
    {
    }

    /**
     * Show contact form.
     */
    public function showAction()
    {
        $this->enableLayout();
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return;
        }

        $params = $this->getAllParams();
        $validator = new Validator();

        if (!$validator->validate($params)) {
            $this->view->error = true;
            return;
        }

        $this->sendMail($validator, $params);
    }

    /**
     * @param Validator $validator
     * @param array     $params
     */
    public function sendMail(Validator $validator, array $params)
    {
        $config = new Config();
        $recipient = $config->getConfig()->email;

        if ($validator->validateEmail($recipient)) {
            $document = \Pimcore\Model\Document\Email::getByPath($config->getTemplateMailPath());
            $thankYouPage = $this->getParam('thankYouPage');

            $mail = new Mail();
            $mail->setTo($recipient);
            $mail->setDocument($document);
            $mail->setParams($params);
            $mail->setFrom(($params['emailSender']) ? $params['emailSender'] : '');
            $mail->setSubject('Contact: ' . (($params['subject']) ? $params['subject'] : ''));

            \Pimcore::getEventManager()->trigger("customRecipient", $mail);

            if ($mail->send()) {
                $this->redirect($thankYouPage);
            }
        }
    }
}
