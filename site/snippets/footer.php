<?php /** @var Kirby\Cms\Pages $pages */ ?>
<?php /** @var Kirby\Cms\Page $page */ ?>
<?php /** @var Kirby\Cms\Site $site */ ?>

<footer class="bg-gray-900 text-gray-400 text-center p-4 text-xs">
    <nav>
        <ul class="flex flex-row items-center justify-center">
            <?php foreach ($pages->find('legal-info', 'privacy-policy') as $subpage): ?>
                <li>
                    <a href="<?= $subpage->url() ?>" class="inline-block px-2 text-primary hover:text-white uppercase">
                        <?= html($subpage->title()) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </nav>
    <p class="uppercase mt-2">&copy; 2008-<?= date("Y") ?> Peter Seaton-Clark. All rights reserved.</p>
</footer>

<?= vite()->js() ?>
</body>
</html>
