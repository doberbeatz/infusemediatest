<?php

require_once(__DIR__ . '/classes/autoload.php');

(new \Controller\BannerLogController(
    new \Repository\BannerLogs(
        new \Service\Database()
    )
))->createOrIncrementView();

(new \Controller\BannerImageController())->render();