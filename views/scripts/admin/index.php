<?php
/**
 * @category    ContactForm
 * @date        19/05/2017 12:16
 * @author      Łukasz Marszałek <lmarszalek@divante.pl>
 * @copyright   Copyright (c) 2017 Divante Ltd. (https://divante.co)
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/plugins/ContactForm/static/css/normalize.css">
    <link rel="stylesheet" href="/plugins/ContactForm/static/css/skeleton.css">
</head>
<body>
<div class="container">
    <h4>E-mail recipient:</h4>
    <form action="#" method="post">
        <div class="row">
            <div class="six columns">
                <input type="text" placeholder="Address email" id="email" name="email"
                       value="<?= $this->email ?>">
            </div>
        </div>
        <input class="button-primary" type="submit" value="save">
    </form>
</div>
</body>
</html>