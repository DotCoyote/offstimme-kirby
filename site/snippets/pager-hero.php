<?php
/** @var Kirby\Cms\Page $heroPage */
?>

<div class="h-screen relative hero-slider">
    <?php foreach ($heroPage->files() as $image): ?>
        <div class="absolute inset-0 bg-cover hero-slider-image"
             style="background-image: url('<?= $image->url() ?>')"></div>
    <?php endforeach; ?>
    <div class="bg-primary-600 inset-0 absolute z-10 bg-opacity-70 flex justify-center items-center align-middle px-8 ">
        <a href="/" class="logo block [&>*]:w-[25rem] [&>*]:h-[5.125rem] [&>*]:max-w-full [&>*]:max-h-full text-white"
           title="Offstimme Logo">
            <svg class="icon">
                <use xlink:href="#icon-logo_horizontal"/>
            </svg>
        </a>

        <div class="absolute bottom-8 inset-x-0 text-center text-white">
            <a href="#main"
               class="bg-gray-800 bg-opacity-50 w-16 h-16 js-scroll-to inline-flex items-center justify-center [&>*]:w-[1.5rem] [&>*]:h-[1.25rem]"
               title="scroll down">
                <svg class="icon">
                    <use xlink:href="#icon-chevron_down"/>
                </svg>
            </a>
        </div>
    </div>
</div>
