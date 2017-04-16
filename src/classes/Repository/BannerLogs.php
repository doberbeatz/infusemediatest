<?php

namespace Repository;

use Entity\BannerLog;
use Service\Database;

class BannerLogs
{
    /** @var string */
    protected $table = 'banner_log';

    /** @var  Database */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @param $data
     * @return BannerLog|null
     */
    public function findRow($data)
    {
        $row = $this->database->selectRow($this->table, $data);

        if (!$row) {
            return null;
        }

        return $this->fillModel($row);
    }


    /**
     * @param $data
     * @return BannerLog
     */
    public function create($data)
    {
        return $this->database->create($this->table, $data);
    }

    /**
     * @param BannerLog $bannerLog
     */
    public function incrementView(BannerLog $bannerLog)
    {
        $this->database->update($this->table, $bannerLog->getId(), [
            'views_count' => $bannerLog->getViewsCount() + 1
        ]);
    }

    /**
     * @param $row
     * @return BannerLog
     */
    protected function fillModel($row)
    {
        $bannerLog = new BannerLog();
        $bannerLog->setId($row['id']);
        $bannerLog->setIpAddress($row['ip_address']);
        $bannerLog->setUserAgent($row['user_agent']);
        $bannerLog->setViewDate($row['view_date']);
        $bannerLog->setPageUrl($row['page_url']);
        $bannerLog->setViewsCount($row['views_count']);

        return $bannerLog;
    }
}