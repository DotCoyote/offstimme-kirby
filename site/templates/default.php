<?php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header'); ?>
<?php snippet('pager-hero-small'); ?>
<?php snippet('main-menu'); ?>
<div id="main">
    <?php $index = 0; ?>
    <?php foreach (
      $page
        ->children()
        ->not('home/slider')
        ->listed()
      as $part
    ): ?>
        <section
            class="
                <?= $part->intendedTemplate() ?>
                bg-gray-800
        ">
            <?php snippet($part->intendedTemplate(), compact('part', 'index')); ?>
        </section>
        <?php $index++; ?>
    <?php endforeach; ?>
</div>

<?php snippet('footer'); ?>
