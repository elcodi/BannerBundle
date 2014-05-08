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

namespace Elcodi\BannerBundle\Tests\Functional\Services;

use Elcodi\CoreBundle\Tests\WebTestCase;

/**
 * Tests BannerManager class
 */
class BannerManagerTest extends WebTestCase
{
    /**
     * Load fixtures of these bundles
     *
     * @return array Bundles name where fixtures should be found
     */
    protected function loadSchema()
    {
        return true;
    }

    /**
     * Load fixtures of these bundles
     *
     * @return array Bundles name where fixtures should be found
     */
    protected function loadFixturesBundles()
    {
        return array(
            'ElcodiCoreBundle',
            'ElcodiBannerBundle',
        );
    }

    /**
     * Returns the callable name of the service
     *
     * @return string service name
     */
    public function getServiceCallableName()
    {
        return 'elcodi.core.banner.services.banner_manager';
    }

    /**
     * Load banners given a bannerzone with language
     */
    public function testGetBannersFromBannerZoneCode()
    {
        $language = $this
            ->manager
            ->getRepository('ElcodiCoreBundle:Language')
            ->findOneBy(array(
                'iso' => 'es',
            ));

        $zones = $this
            ->container
            ->get('elcodi.core.banner.services.banner_manager')
            ->getBannersFromBannerZoneCode('bannerzone-code', $language);

        $this->assertInstanceOf('Doctrine\Common\Collections\Collection', $zones);
        $this->assertCount(1, $zones);
    }

    /**
     * Load banners given a bannerzone with language
     */
    public function testGetBannersFromBannerZoneCodeNoLanguage()
    {
        $zones = $this
            ->container
            ->get('elcodi.core.banner.services.banner_manager')
            ->getBannersFromBannerZoneCode('bannerzone-code-nolanguage');

        $this->assertInstanceOf('Doctrine\Common\Collections\Collection', $zones);
        $this->assertCount(1, $zones);
    }
}
