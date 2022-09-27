<?php /** @var Kirby\Cms\Page $page */ ?>

<?php snippet('header') ?>
<?php snippet('slider') ?>

But this is a homepage

<h1><?= $page->title() ?></h1>

<?php snippet('footer') ?>
