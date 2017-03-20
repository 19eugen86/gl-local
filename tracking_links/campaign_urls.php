<?php
/**
 * Created by PhpStorm.
 * User: EEDLENKO
 * Date: 14.03.2017
 * Time: 12:27
 */

class CampaignUrlsImporter
{
    /**
     *
     */
    const ADV_PATH = '../../EXTADS/trunk/public';

    /**
     *
     */
    const DB_HOST = 'localhost';
    /**
     *
     */
    const DB_NAME = 'ext_ads';
    /**
     *
     */
    const DB_USERNAME = 'root';
    /**
     *
     */
    const DB_PASSWORD = '';

    /**
     * @var
     */
    private $db;
    /**
     * @var
     */
    private $advertisers;
    /**
     * @var
     */
    private $campaigns;
    /**
     * @var
     */
    private $campaignsUrlsIds;
    /**
     * @var
     */
    private $productBuilds;

    /**
     *
     */
    public function run()
    {
        $links = $this->generateTrackingLinks();
        $this->import($links);
    }

    /**
     * @return array
     */
    protected function generateTrackingLinks()
    {
        $links = [];

        $advertisers = $this->getAdvertisers();
        $campaigns = $this->getCampaigns();

        foreach ($advertisers as $advertiser) {
            if (!empty($campaigns[$advertiser['id']]) && is_array($campaigns[$advertiser['id']])) {

                $linkSample = 'http://extads.gameloft.com/'.$advertiser['dir'].'/';
                if (substr_count($advertiser['dir'], 'detect') > 0) {
                    $queryStrSample = 'eproduct_id=%s&gos=%s';
                    $isDetect = true;
                } else {
                    $queryStrSample = 'gcampaign_id=%s&gproduct_id=%s&gos=%s';
                    $isDetect = false;
                }

                $advertiserCampaigns = $campaigns[$advertiser['id']];
                foreach ($advertiserCampaigns as $campaign) {
                    if ($isDetect) {
                        $queryStr = sprintf(
                            $queryStrSample,
                            $campaign['product_id'],
                            $campaign['os']
                        );
                    } else {
                        $queryStr = sprintf(
                            $queryStrSample,
                            $campaign['id'],
                            $campaign['gl_product_id'],
                            $campaign['os']
                        );
                    }

                    $links[$campaign['id']]['click'] = $linkSample.'click.php?'.$queryStr;

                    $links[$campaign['id']]['imps'] = '';
                    if ($advertiser['impressions']) {
                        $links[$campaign['id']]['imps'] = $linkSample.'impression.php?'.$queryStr;
                    }
                }
            }
        }

        return $links;
    }

    /**
     * @param $links
     */
    protected function import($links)
    {
        $queries = [];

        // SQL queries
        foreach ($links as $campaignId => $link) {
            if (!empty($link["click"])) {
                $queries[] = 'INSERT INTO `campaign_urls`(`campaign_id`, `event`,`url`) VALUES ('.$campaignId.', "click", "'.$link["click"].'")';
            }

            if (!empty($link["imps"])) {
                $queries[] = 'INSERT INTO `campaign_urls`(`campaign_id`, `event`, `url`) VALUES ('.$campaignId.', "impression", "'.$link["imps"].'")';
            }
        }

        // Inserting
        foreach ($queries as $sql) {
            $this->query($sql, false);
        }

        echo 'Rows inserted: '.count($queries);
    }

    /**
     * @return mixed
     */
    protected function getAdvertisers()
    {
        if (empty($this->advertisers)) {
            $advList = scandir(self::ADV_PATH);
            $advertisers = $this->query('SELECT * FROM advertisers WHERE 1');

            $detectExclusions = $this->getDetectExclusions();

            foreach ($advList as $advDir) {
                if ($advDir == '.' || $advDir == '..') {
                    continue;
                }

                foreach ($advertisers as $key => $advertiser) {
                    if (strtolower($advertiser["name"]) == $advDir) {

                        $advSubDirs = scandir(self::ADV_PATH."/$advDir");
                        if (in_array('detect', $advSubDirs) && !in_array($advertiser["id"], $detectExclusions)) {
                            $advDir .= '/detect';
                        }

                        $this->advertisers[] = [
                            'id'            => intval($advertiser["id"]),
                            'name'          => $advertiser["name"],
                            'impressions'   => intval($advertiser["impressions"]),
                            'dir'           => $advDir,
                        ];
                    }
                }
            }
        }
        return $this->advertisers;
    }

    /**
     * @return mixed
     */
    protected function getCampaigns()
    {
        if (empty($this->campaigns)) {
            $campaigns = $this->query('SELECT * FROM campaigns WHERE name LIKE "UC%"');
            $campaignsUrlsIds = $this->getCampaignsUrlsIds();
            $platformBuilds = $this->getProductBuilds();
            foreach ($campaigns as $campaign) {
                if (in_array($campaign['id'], $campaignsUrlsIds)) {
                    continue;
                }

                foreach ($platformBuilds["builds"] as $os => $builds) {
                    if (in_array($campaign["product_build_id"], $builds)) {
                        $campaign['os'] = $os;
                        break;
                    }
                }

                $campaign['product_id'] = $platformBuilds["products"][$campaign["product_build_id"]];
                $campaign['gl_product_id'] = $platformBuilds["gl_products"][$campaign["product_build_id"]];

                $this->campaigns[$campaign['advertiser_id']][] = [
                    'id'                => $campaign['id'],
                    'name'              => $campaign['name'],
                    'product_build_id'  => $campaign['product_build_id'],
                    'os'                => $campaign['os'],
                    'gl_product_id'     => $campaign['gl_product_id'],
                    'product_id'        => $campaign['product_id']
                ];
            }
        }
        return $this->campaigns;
    }

    /**
     * @return mixed
     */
    protected function getCampaignsUrlsIds()
    {
        if (empty($this->campaignsUrlsIds)) {
            $ids = [];

            $result = $this->query('SELECT * FROM campaign_urls WHERE 1');
            foreach ($result as $row) {
                $ids[] = $row['campaign_id'];
            }

            $this->campaignsUrlsIds = array_unique($ids);
        }
        return $this->campaignsUrlsIds;
    }

    /**
     * @return mixed
     */
    protected function getProductBuilds()
    {
        if (empty($this->productBuilds)) {
            $productBuilds = $this->query('SELECT * FROM product_builds WHERE 1');

            foreach ($productBuilds as $build) {
                $this->productBuilds["builds"][$build["build"]][] = $build["id"];
                $this->productBuilds["products"][$build["id"]] = $build["product_id"];
                $this->productBuilds["gl_products"][$build["id"]] = $build["gameloft_product_id"];
            }
        }
        return $this->productBuilds;
    }

    /**
     * @return mixed
     */
    protected function getDb()
    {
        if (empty($this->db)) {
            $this->db = mysqli_connect(
                self::DB_HOST,
                self::DB_USERNAME,
                self::DB_PASSWORD,
                self::DB_NAME
            );
        }
        return $this->db;
    }

    /**
     * @param $sql
     * @param bool $return
     * @return array|null
     */
    protected function query($sql, $return = true)
    {
        $query = mysqli_query($this->getDb(), $sql);
        if ($return) {
            return mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    }

    /**
     * @return array
     */
    protected function getDetectExclusions()
    {
        return [
            70,	    // Chartboost
            81,	    // Google
            118,	// Gameloft
            228,	// Studentroom
            236,	// Facebook
            250,	// Outbrain
            264,	// Twitter
            270,	// Ytsponsorship
            294,	// Ligatus
            300,	// Storemaven
            354,	// Yandex
        ];
    }
}

$importer = new CampaignUrlsImporter();
$importer->run();

echo '<br/>';
die('DONE');