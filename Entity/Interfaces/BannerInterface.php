<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author  ##author_placeholder
 * @version ##version_placeholder##
 */

namespace Elcodi\BannerBundle\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

use Elcodi\CoreBundle\Entity\Interfaces\DateTimeInterface;
use Elcodi\CoreBundle\Entity\Interfaces\EnabledInterface;
use Elcodi\MediaBundle\Entity\Interfaces\ImagesContainerInterface;

/**
 * BannerInterface
 */
interface BannerInterface extends EnabledInterface, DateTimeInterface, ImagesContainerInterface
{
    /**
     * Set banner name
     *
     * @param string $name Name of the banner
     *
     * @return BannerInterface self Object
     */
    public function setName($name);

    /**
     * Get banner name
     *
     * @return string
     */
    public function getName();

    /**
     * Set banner description
     *
     * @param string $description Description of the banner
     *
     * @return BannerInterface self Object
     */
    public function setDescription($description);

    /**
     * Get banner description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set banner url
     *
     * @param string $url Url of the banner
     *
     * @return BannerInterface self Object
     */
    public function setUrl($url);

    /**
     * Get banner url
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set banner zones to banner
     *
     * @param Collection $bannerZones Banner zones
     *
     * @return BannerInterface self Object
     */
    public function setBannerZones(Collection $bannerZones);

    /**
     * Get banner zones from banner
     *
     * @return Collection banner zones
     */
    public function getBannerZones();

    /**
     * Add banner zone to banner
     *
     * @param BannerZoneInterface $bannerZone Banner Zone
     *
     * @return BannerInterface self Object
     */
    public function addBannerZone(BannerZoneInterface $bannerZone);

    /**
     * Remove banner zone from banner
     *
     * @param BannerZoneInterface $bannerZone Banner Zone
     *
     * @return BannerInterface self Object
     */
    public function removeBannerZone(BannerZoneInterface $bannerZone);
}
