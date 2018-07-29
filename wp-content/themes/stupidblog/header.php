<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head();?>
</head>
<body <?php body_class();?> >
    <header class = "site-header">
        <h2><?php bloginfo('title'); ?></h2>
    </header>
