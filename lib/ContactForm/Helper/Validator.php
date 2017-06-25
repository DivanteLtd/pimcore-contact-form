<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */
namespace ContactForm\Helper;

/**
 * Class Validator
 * @package ContactForm\Helper
 */
class Validator
{
    /**
     * Required fields.
     *
     * @var array
     */
    protected $requiredParams = [
        'senderEmail',
        'senderName',
        'subject',
        'message'
    ];

    /**
     * @param array $params
     * @return bool
     */
    public function validate(array $params) : bool
    {
        return ($this->validateEmail($params['senderEmail']) && $this->checkRequired($params));
    }

    /**
     * @param array $params
     * @return bool
     */
    public function checkRequired(array $params) : bool
    {
        foreach ($this->requiredParams as $param) {
            if (empty($params[$param])) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function validateEmail(string $email) : bool
    {
        $emailValidator = new \Zend_Validate_EmailAddress();

        return $emailValidator->isValid($email);
    }
}
