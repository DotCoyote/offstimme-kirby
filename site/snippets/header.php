<?php
/** @var Kirby\Cms\Pages $pages */
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */
/** @var Kirby\Cms\App $kirby */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offstimme Kirby</title>
    <?php
    if (!$kirby->user()) {
        $user = $kirby->user($page->env('KIRBY_API_USER'));
        $user->login($page->env('KIRBY_API_PW'));
    }
    ?>
    <?= vite()->css(); ?>
</head>
<body class="text-gray-300 bg-gray-800">
