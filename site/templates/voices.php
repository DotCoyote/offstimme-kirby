<?php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header'); ?>
<?php snippet('pager-hero-small'); ?>
<?php snippet('main-menu'); ?>
<header class="container pt-16">
    <h1 class="text-center"><?= $page->title() ?></h1>
</header>

<div class="js-voices-component">
    <div class="flex text-primary justify-center p-8 [&>*]:animate-spin [&>*]:w-12 [&>*]:h-12">
        <?= svg('src/assets/icons/loading.svg') ?>
    </div>
</div>

<?php snippet('footer'); ?>
