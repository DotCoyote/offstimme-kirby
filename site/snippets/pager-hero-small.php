<?php
/** @var Kirby\Cms\Page $heroPage */
/** @var Kirby\Cms\Site $site */
?>

<div class="h-[300px] relative">
    <?php if ($site->heroImage() && $site->heroImage()->toFile()): ?>
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('<?= $site
                 ->heroImage()
                 ->toFile()
                 ->url() ?>')"></div>
    <?php endif; ?>
    <div class="bg-primary-600 inset-0 absolute z-10 bg-opacity-60 flex justify-center items-center align-middle px-8 ">
        <a href="/" class="logo block [&>*]:w-[25rem] [&>*]:h-[5.125rem] [&>*]:max-w-full [&>*]:max-h-full text-white"
           title="Offstimme Logo">
            <svg class="icon">
                <use xlink:href="#icon-logo_horizontal"/>
            </svg>
        </a>

    </div>
</div>
