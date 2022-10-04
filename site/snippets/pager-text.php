<?php
/** @var Kirby\Cms\Page $part */
/** @var int $index */
?>

<div class="py-16">
    <div class="container max-w-3xl">
        <?php if ($index === 0): ?>
            <h1 class="text-center"><?= $part->headline() ?></h1>
        <?php else: ?>
            <h2 class="text-center"><?= $part->headline() ?></h2>
        <?php endif; ?>
        <?= $part->text()->kt() ?>
    </div>
</div>
