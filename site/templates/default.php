<?php /** @var Kirby\Cms\Page $page */ ?>

<?php snippet('header') ?>
<?php snippet('main-menu') ?>
<h1><?= $page->title() ?></h1>

<?php snippet('footer') ?>
