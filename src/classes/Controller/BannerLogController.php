<?php

namespace Controller;

use Repository\BannerLogs;

class BannerLogController
{
    /** @var  BannerLogs */
    protected $repository;

    public function __construct(BannerLogs $repository)
    {
        $this->repository = $repository;
    }

    public function createOrIncrementView()
    {
        $data = [
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'page_url' => $_SERVER['HTTP_REFERER']
        ];

        if ($bannerLog = $this->repository->findRow($data)) {
            $this->repository->incrementView($bannerLog);
        } else {
            $this->repository->create($data);
        }
    }
}