<?php
/** @var Kirby\Cms\Page $page */
?>
<?php
/** @var Kirby\Cms\Site $site */
?>

<?php snippet('header'); ?>

<?php
$heroPage = $page->find('slider');
if ($heroPage):
  snippet($heroPage->intendedTemplate(), compact('heroPage'));
endif;
?>

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
                <?php if ($index % 2 == 0): ?>bg-gray-800<?php else: ?>bg-gray-700<?php endif; ?>
        ">
            <?php snippet($part->intendedTemplate(), compact('part', 'index')); ?>
        </section>
        <?php $index++; ?>
    <?php endforeach; ?>
</div>

<?php snippet('footer'); ?>
