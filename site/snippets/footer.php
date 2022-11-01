<?php
/** @var Kirby\Cms\Pages $pages */
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */
/** @var Kirby\Cms\App $kirby */
?>

<footer>
    <section class="footer-top bg-gray-800 flex justify-center pt-12">
        <nav>
            <ul class="flex gap-8 flex-row">
                <?php foreach ($site->socialLinks()->toStructure() as $socialLink): ?>
                    <li>
                        <a href="<?= $socialLink->url() ?>" target="_blank"
                           class="bg-gray-900 text-gray-700 hover:bg-primary transition-colors duration-200 flex justify-center items-center w-16 h-16 lg:w-20 lg:h-20"
                           rel="nofollow">
                            <svg class="icon w-8 h-8">
                                <use xlink:href="#icon-<?= $socialLink->iconName(); ?>"/>
                            </svg>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </section>
    <section class="footer-bottom bg-gray-900 text-gray-400 text-center p-4 text-xs mt-12">
        <nav>
            <ul class="flex flex-row items-center justify-center">
                <?php foreach ($pages->find('legal-info', 'privacy-policy') as $subpage): ?>
                    <li>
                        <a href="<?= $subpage->url() ?>"
                           class="inline-block px-2 text-primary hover:text-white uppercase">
                            <?= html($subpage->title()) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <p class="uppercase mt-2">&copy; 2008-<?= date('Y') ?> Peter Seaton-Clark. All rights reserved.</p>
    </section>
</footer>

<script>
    window.csrf = "<?= csrf() ?>";
    window.lang = "<?= $kirby->language() ?>";
    window.voiceActorsUrl = "<?= $site->find('voices')->url() ?>";
</script>
<?= vite()->js() ?>
</body>
</html>
