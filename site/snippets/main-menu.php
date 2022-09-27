<?php /** @var Kirby\Cms\Pages $pages */ ?>
<?php /** @var Kirby\Cms\Page $page */ ?>
<?php /** @var Kirby\Cms\Site $site */ ?>

<?php
$items = $pages->listed();
if ($items->isNotEmpty()):

    ?>
    <div class="js-sticky-nav bg-gray-900 h-16 w-full text-white px-4 flex flex-row justify-between items-center">
        <a href="<?= $site->url() ?>" class="text-white block w-12 h-12 [&>*]:w-full [&>*]:h-full">
            <?= svg('src/assets/icons/logo_icon.svg') ?>
        </a>

        <div class="flex flex-row h-full items-center">
            <nav>
                <ul class="h-full flex">
                    <?php foreach ($items as $item): ?>
                        <li class="h-full"><a
                                class="<?php e($item->isOpen(), ' active font-bold text-white', 'font-light text-gray-200') ?> h-full px-4 flex justify-center items-center leading-none uppercase tracking-wide hover:text-primary transition-colors duration-200"
                                href="<?= $item->url() ?>"><span><?= $item->title()->html() ?></span></a></li>
                    <?php endforeach ?>

                </ul>
            </nav>
            <nav class="pl-6">
                <ul>
                    <?php foreach ($kirby->languages() as $language): ?>
                        <?php if ($kirby->language() != $language): ?>
                            <li<?php e($kirby->language() == $language, ' class="active"') ?>>
                                <a href="<?php echo $language->url() ?>" hreflang="<?php echo $language->code() ?>"
                                   title="<?php echo html($language->name()) ?>">
                                    <?= svg('src/assets/icons/flag_' . $language->code() . '.svg') ?>

                                </a>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
    </div>
<?php endif ?>
