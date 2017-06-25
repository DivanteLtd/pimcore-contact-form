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
        <div class="generic-content">
            <div class="container">
                <h3>ContactForm</h3>
                <table class="editmode-table">
                    <tr>
                        <td class="editmode-label">Header:</td>
                        <td class="editmode-input"><?= $this->input('header',
                                ['placeholder' => ['Contact Us']]); ?></td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Name - message alert:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'msg-alert-name',
                                ['placeholder' => 'Name can not be empty!']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Email - message alert:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'msg-alert-email',
                                ['placeholder' => 'Email is invalid!']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Subject - message alert:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'msg-alert-subject',
                                ['placeholder' => 'Subject can not be empty!']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Message - message alert:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'msg-alert-message',
                                ['placeholder' => 'Message should be more than 10 characters']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Name - placeholder:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'placeholder-name',
                                ['placeholder' => 'John Smith']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Name - label:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'label-name',
                                ['placeholder' => 'Name:']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Email - placeholder:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'placeholder-email',
                                ['placeholder' => 'john.smith@example.com']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Email - label:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'label-email',
                                ['placeholder' => 'Email:']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Subject - placeholder:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'placeholder-subject',
                                ['placeholder' => 'Example subject']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Subject - label:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'label-subject',
                                ['placeholder' => 'Subject:']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Message - placeholder:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'placeholder-message',
                                ['placeholder' => 'Example message']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Message - label:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'label-message',
                                ['placeholder' => 'Message:']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Button - text:</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'btn-text',
                                ['placeholder' => 'Send']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">Email - error message</td>
                        <td class="editmode-input">
                            <?= $this->input(
                                'error-alert',
                                ['placeholder' => 'Oups! Something went wrong!']
                            ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="editmode-label">ThankYouPage</td>
                        <td class="editmode-input"><?= $this->href('thankYouPage'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($this->error) : ?>
    <div class="alert alert-danger">
        <?= $this->input('error-alert')->getData(); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="col-md-6 centred">
        <div class=" form-area">
            <h2 class="text-center">
                <?= $this->input('header')->getData(); ?>
            </h2>
            <div class="errors">
            </div>
            <form action="" class="contact-form" method="POST">
                <div class="form-group">
                    <label for="senderName"><?= $this->input('label-name')->getData(); ?></label>
                    <input type="text" name="senderName" id="senderName" class="name form-control"
                           placeholder="<?= $this->input('placeholder-name')->getData(); ?>">
                    <span class="asterix">*</span>
                    <div class="alert alert-danger custom-alert">
                        <?= $this->input('msg-alert-name')->getData(); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senderEmail"><?= $this->input('label-email')->getData(); ?></label>
                    <input type="text" name="senderEmail" id="senderEmail" class="email form-control"
                           placeholder="<?= $this->input('placeholder-email')->getData(); ?>">
                    <span class="asterix">*</span>
                    <div class="alert alert-danger custom-alert">
                        <?= $this->input('msg-alert-email')->getData(); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject"><?= $this->input('label-subject')->getData(); ?></label>
                    <input type="text" name="subject" class="subject form-control"
                           placeholder="<?= $this->input('placeholder-subject')->getData(); ?>">
                    <span class="asterix">*</span>
                    <div class="alert alert-danger custom-alert">
                        <?= $this->input('msg-alert-subject')->getData(); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message"><?= $this->input('label-message')->getData(); ?></label>
                    <textarea class=" message form-control" name="message"
                              placeholder="<?= $this->input('placeholder-message')->getData(); ?>" rows="7"></textarea>
                    <span class="asterix">*</span>
                    <div class="alert alert-danger custom-alert">
                        <?= $this->input('msg-alert-message')->getData(); ?>
                    </div>
                </div>
                <input type="hidden" name="thankYouPage" class="thankYouPage form-control"
                       value="<?= $this->href('thankYouPage')->getFullPath(); ?>"/>
                <div class="form-group">
                    <input type="submit" value="<?= $this->input('btn-text')->getData(); ?>"
                           class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
