<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */
?>
<?php if ($this->editmode) : ?>
    <div class="container--large">
        <div class="generic-content" style="border: 2px #8a8583 dashed; padding-bottom: 10px;">
            <div class="container">
                <h4>Hints</h4>
                <ul>
                    <li>%Text(senderName); - value of senderName field</li>
                    <li>%Text(senderEmail); - value of senderEmail field</li>
                    <li>%Text(subject); - subject of email</li>
                    <li>%Text(message); - content of message</li>
                </ul>
            </div>
        </div>
    </div>
<?php endif ?>
<h3>Message from contact form</h3>
<?= $this->wysiwyg('textContent'); ?>
