<?php
/** @var Kirby\Cms\Page $page */

use Kirby\Http\Uri;

?>

<?php snippet('header'); ?>
<?php snippet('pager-hero-small'); ?>
<?php snippet('main-menu'); ?>
<header class="container pt-16">
    <h1 class="text-center"><?= $page->title() ?></h1>
</header>

<main class="container mt-12 max-w-2xl">

    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <div><?php if ($file = $page->image()): ?>
                <img src="<?= $file->thumb(
                    [
                        'width' => 300,
                        'height' => 300,
                        'crop' => 'center',
                        'format' => 'webp',
                        'grayscale' => true,
                        'quality' => 70,
                    ]
                )->url() ?>" alt="<?= $page->title() ?>">
            <?php endif ?>
        </div>

        <div class="lg:col-span-2 xl:col-span-3">
            <table class="w-full">
                <tbody>
                <tr>
                    <th class="pr-4 text-left">Voice-Age</th>
                    <td><?= $page->voiceAge() ?></td>
                </tr>
                <tr>
                    <th class="pr-4 text-left">Voice-Style</th>
                    <td><?= $page->voiceStyle() ?></td>
                </tr>
                <tr>
                    <th class="pr-4 text-left">Country</th>
                    <td><?= $page->country() ?></td>
                </tr>
                <tr>
                    <th class="pr-4 text-left">Sex</th>
                    <td><?= $page->sex() ?></td>
                </tr>
                <?php if ($probe = $page->voiceProbes()): ?>
                    <?php foreach ($probe->toStructure() as $voiceProbe): ?>
                        <tr>
                            <th class="pr-4 text-left w-1/3">Voice Probe <br>
                                <span class="inline-flex flex-row items-center">
                                <?php if ($flag = $voiceProbe->flag()): ?>
                                    <img src="<?= $flag->url() ?>" class="max-w-12 max-h-4 mr-2" />
                                <?php endif ?>
                            <span
                                class="text-sm"><?= $voiceProbe->language() ?></span>
                            </span>
                            </th>

                            <td>
                                <div class="flex flex-row items-center">
                                    <?php if ($file = $voiceProbe->file()->toFile()): ?>
                                        <figure class="p-2 w-full">
                                            <audio controls src="
                            <?= $file->url() ?>" class="w-full">
                                                <p>
                                                    Your browser does not support HTML audio, but you can still
                                                    <a href="
                            <?= $file->url() ?>">download the music</a>.
                                                </p>

                                            </audio>
                                        </figure>
                                        <a href="<?= $file->url() ?>" download title="<?= t('download') ?>"
                                           class="btn btn--primary inline-flex items-center text-white !p-2">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                 viewBox="0 0 24 24"
                                                 class="w-6 h-6"
                                                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                            </svg>
                                            <span class="ml-2 sr-only"><?= t('download') ?></span>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8">
        <?php
        $uri = Uri::current();
        $backlink = $uri->query()->get('backlink');
        ?>
        <a href="<?= $backlink ?? $page->parent()->url() ?>" class="btn btn--primary"><?= t('back') ?></a>
    </div>
</main>

<?php snippet('footer'); ?>
