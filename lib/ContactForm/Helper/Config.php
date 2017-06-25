<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */
namespace ContactForm\Helper;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Folder;

/**
 * Class Config
 * @package ContactForm\Helper
 */
class Config
{
    const CONFIG_EMAIL = "emailcontact.php";

    const DOCUMENT_EMAIL_NAME = 'ContactMail';

    const PLUGIN_FOLDER_NAME = 'ContactForm';

    /**
     * @return \Zend_Config
     */
    public function getConfig() : \Zend_Config
    {
        return (file_exists($this->getConfigFilePath()) ? new \Zend_Config(include($this->getConfigFilePath()),
            true) : new \Zend_Config(array("email" => null), true));
    }

    /**
     * @param \Zend_Config $config
     * @return \Zend_Config
     */
    public function setConfig(\Zend_Config $config) : \Zend_Config
    {
        $configFile = $this->getConfigFilePath();
        \Pimcore\File::putPhpFile($configFile, to_php_data_file_format($config->toArray()));

        return $config;
    }

    /**
     * @return string
     */
    public function getConfigFilePath() : string
    {
        return PIMCORE_CUSTOM_CONFIGURATION_DIRECTORY . "/" . self::CONFIG_EMAIL;
    }

    /**
     * @return bool
     */
    public function verifyConfig() : bool
    {
        $folder = Folder::getByPath('/' . self::PLUGIN_FOLDER_NAME);
        $document = Document::getByPath('/' . self::PLUGIN_FOLDER_NAME . '/' . self::DOCUMENT_EMAIL_NAME);

        return (file_exists($this->getConfigFilePath()) && !is_null($folder) && !is_null($document));
    }

    /**
     * @return string
     */
    public function getTemplateMailPath() : string
    {
        return '/' . self::PLUGIN_FOLDER_NAME . '/' . self::DOCUMENT_EMAIL_NAME;
    }
}
