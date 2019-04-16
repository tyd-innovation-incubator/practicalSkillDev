<?php

namespace App\Repositories\Sysdef;

use App\Models\Information\Forum;
use App\Models\Information\News;
use App\Models\Sysdef\Region;
use App\Repositories\BaseRepository;
use App\Repositories\Business\CommodityRepository;
use App\Repositories\Business\OfferRepository;
use App\Repositories\Business\TenderRepository;
use App\Repositories\Information\AnnouncementRepository;
use App\Repositories\Information\EventRepository;
use App\Repositories\Information\ForumRepository;
use App\Repositories\Information\NewsRepository;
use App\Repositories\Service\AdRepository;

class HomeRepository extends BaseRepository
{
    protected $commodities;
    protected $news;
    protected $forums;
    protected $events;
    protected $announcements;
    protected $tenders;
    protected $offers;

    public function __construct()
    {
        $this->commodities = new CommodityRepository();
        $this->news = new NewsRepository();
        $this->forums = new ForumRepository();
        $this->events = new EventRepository();
        $this->announcements = new AnnouncementRepository();
        $this->tenders = new TenderRepository();
        $this->offers = new OfferRepository();

    }

    /**
     * @return mixed
     * Get all recent info for home page
     */
    public function latestInfo()
    {
        /*information center*/
        $news = $this->news->getLatestNews(8);
        $forums = $this->forums->getLatestThreads(8);
        $events = $this->events->getLatest(8);
        $announcements = $this->announcements->getLatest(8);
        /*Business*/
        $transport_cargoes = $this->tenders->getTransportCargoLatest(8);
        $transport_offers = $this->offers->getTransportOffersLatest(8);
        $commodities = $this->commodities->getAllLimit(10);
        return [
            'latest_commodities' => $commodities,
            'latest_news' => $news,
            'latest_forums' => $forums,
            'latest_events' => $events,
            'latest_announcements' => $announcements,
            'latest_transport_cargoes' => $transport_cargoes,
            'latest_transport_offers' => $transport_offers,
        ];
    }

    public function getRegionById($id)
    {
        $region = $this->query()->where('id', $id)->first();
        return $region;
    }
}
