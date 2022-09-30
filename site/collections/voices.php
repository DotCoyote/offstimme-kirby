<?php

use Kirby\Cms\Site;

return function (Site $site) {
  return $site->find('voices')->children();
};
