<?php /** @var Kirby\Cms\Page $page */ ?>

<?php snippet('header') ?>
<?php snippet('main-menu') ?>
<h1><?= $page->title() ?></h1>

<div class="js-voices-component">
    <div class="flex text-primary justify-center p-8 [&>*]:animate-spin [&>*]:w-12 [&>*]:h-12">
        <?= svg('src/assets/icons/loading.svg') ?>
    </div>
</div>

<?php snippet('footer') ?>
