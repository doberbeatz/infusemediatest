<?php

namespace Entity;

use DateTime;

class BannerLog {

    /** @var  int */
    protected $id;

	/** @var  string */
	protected $ipAddress;

	/** @var  string */
	protected $userAgent;

	/** @var  DateTime */
	protected $viewDate;

	/** @var  string */
	protected $pageUrl;

	/** @var  int */
    protected $viewsCount;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return DateTime
     */
    public function getViewDate()
    {
        return new DateTime($this->viewDate);
    }

    /**
     * @param DateTime $viewDate
     */
    public function setViewDate($viewDate)
    {
        $this->viewDate = $viewDate;
    }

    /**
     * @return string
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * @param string $pageUrl
     */
    public function setPageUrl($pageUrl)
    {
        $this->pageUrl = $pageUrl;
    }

    /**
     * @return int
     */
    public function getViewsCount()
    {
        return $this->viewsCount;
    }

    /**
     * @param int $viewsCount
     */
    public function setViewsCount($viewsCount)
    {
        $this->viewsCount = $viewsCount;
    }
}