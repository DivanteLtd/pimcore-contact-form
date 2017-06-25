<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */
namespace ContactForm;

use ContactForm\Helper\Config;
use Pimcore\API\Plugin as PluginLib;
use Pimcore\Model\Document;

/**
 * Class Plugin
 * @package ContactForm
 */
class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{
    /**
     * @return string
     */
    public static function install() : string
    {
        $config = new Config();
        $folder = Document\Folder::getByPath('/' . $config::PLUGIN_FOLDER_NAME);

        if (!$folder) {
            $folder = Document\Folder::create(1, ['key' => $config::PLUGIN_FOLDER_NAME]);
        }

        $document = Document::getByPath($config->getTemplateMailPath());

        if (!$document) {
            $document = Document\Email::create(
                $folder->getId(),
                [
                    'key' => $config::DOCUMENT_EMAIL_NAME,
                    'module' => 'ContactForm',
                    'controller' => 'index',
                    'action' => 'email',
                ]
            );
        }

        return 'Plugin successfully installed!';
    }

    /**
     * @return string
     */
    public static function uninstall() : string
    {
        $config = new Config();
        $document = Document::getByPath($config->getTemplateMailPath());

        if ($document) {
            $document->delete();
        }

        $folder = Document\Folder::getByPath('/' . $config::PLUGIN_FOLDER_NAME);

        if ($folder) {
            $folder->delete();
        }

        return 'Plugin successfully uninstalled!';
    }

    /**
     * @return bool
     */
    public static function isInstalled()
    {
        $config = new Config();

        return $config->verifyConfig();
    }
}
