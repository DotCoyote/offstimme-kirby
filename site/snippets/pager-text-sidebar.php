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

        <div class="md:grid grid-cols-4 gap-4">
            <div class="col-span-3">

                <?= $part->text()->kt() ?>
            </div>
            <div class="col-span-1">
                <div class=" grid grid-cols-1 gap-4">
                    <?php foreach ($part->images() as $image): ?>
                        <div class="[+ *]:mt-4"
                             style="background-image: url('<?= $image->url() ?>')">
                            <img src="<?= $image->url() ?>"/>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
