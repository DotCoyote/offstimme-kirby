<?php
/** @var Kirby\Cms\Pages $pages */
?>
<?php
/** @var Kirby\Cms\Page $page */
?>
<?php
/** @var Kirby\Cms\Site $site */
?>

<?php
$items = $pages->listed();
if ($items->isNotEmpty()): ?>
    <div
        class="js-sticky-nav sticky top-0 z-20 bg-gray-900 h-16 w-full text-white px-4 flex flex-row justify-between items-center">
        <div class="flex flex-row items-center">

            <a href="<?= $site->url() ?>" class="text-white block w-12 h-12 [&>*]:w-full [&>*]:h-full">
                <svg class="icon">
                    <use xlink:href="#icon-logo_icon"/>
                </svg>
            </a>

            <div class="js-voice-quick-search ml-4 hidden md:block">
                <voice-actor-quick-search></voice-actor-quick-search>
            </div>
        </div>

        <div class="flex flex-row h-full items-center">
            <nav class="main-nav hidden md:block">
                <ul class="h-full flex">
                    <?php foreach ($items as $item): ?>
                        <li class="h-full"><a
                                class="<?php e(
                                    $item->isOpen(),
                                    ' active font-bold text-white',
                                    'font-light text-gray-200'
                                ); ?> h-full px-4 flex justify-center items-center leading-none uppercase tracking-wide hover:text-primary transition-colors duration-200"
                                href="<?= $item->url() ?>"><span><?= $item->title()->html() ?></span></a></li>
                    <?php endforeach; ?>

                </ul>
            </nav>
            <nav class="pl-6">
                <ul>
                    <?php foreach ($kirby->languages() as $language): ?>
                        <?php if ($kirby->language() != $language): ?>
                            <li<?php e($kirby->language() == $language, ' class="active"'); ?>>
                                <a href="<?= $page->url($language->code()) ?>"
                                   hreflang="<?php echo $language->code(); ?>"
                                   title="<?php echo html($language->name()); ?>">
                                    <svg class="icon w-7 h-5 block">
                                        <use xlink:href="#icon-flag_<?= $language->code(); ?>"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="js-mobile-nav md:hidden ml-4">
                <button class="js-nav-toggle-button p-2">
                    <svg class="icon w-6 h-6">
                        <use xlink:href="#icon-menu"/>
                    </svg>
                </button>
                <nav class="mobile-nav hidden js-mobile-nav-container">
                    <button
                        class="js-nav-toggle-button absolute top-0 right-0 p-5">

                        <svg class="icon w-6 h-6">
                            <use xlink:href="#icon-close"/>
                        </svg>
                    </button>
                    <nav class="pt-16">
                        <ul class="border-b border-solid border-gray-700">
                            <?php foreach ($items as $item): ?>
                                <li class="h-full"><a
                                        class="<?php e(
                                            $item->isOpen(),
                                            ' active font-bold text-white',
                                            'font-light text-gray-200'
                                        ); ?> h-full px-4 leading-none uppercase tracking-wide hover:text-primary transition-colors duration-200 p-4 border-t border-solid border-gray-700 text-lg block"
                                        href="<?= $item->url() ?>"><span><?= $item->title()->html() ?></span></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </nav>
                </nav>
            </div>
        </div>
    </div>
<?php endif;
?>
