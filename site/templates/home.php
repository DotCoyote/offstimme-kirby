<?php /** @var Kirby\Cms\Page $page */ ?>
<?php /** @var Kirby\Cms\Site $site */ ?>

<?php snippet('header') ?>

<?php
$heroPage = $page->find('slider');

if ($heroPage):
    snippet($heroPage->intendedTemplate(), compact('heroPage'));
endif;
?>

<?php snippet('main-menu') ?>

<div id="main">
    <h1><?= $page->title() ?></h1>

    <?php foreach ($page->children()->not('home/slider')->listed() as $part) : ?>
        <section class="<?= $part->intendedTemplate() ?>">
            <?php snippet($part->intendedTemplate(), compact('part')) ?>
        </section>
    <?php endforeach ?>
</div>

<?php snippet('footer') ?>
