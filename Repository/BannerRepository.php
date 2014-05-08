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

namespace Elcodi\BannerBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

use Elcodi\CoreBundle\Entity\Interfaces\LanguageInterface;

/**
 * BannerRepository
 */
class BannerRepository extends EntityRepository
{
    /**
     * Get activated banners by specific banner zone (and optional zone code)
     *
     * Return an ArrayCollection object
     *
     * @param string            $bannerZoneCode BannerZone code
     * @param LanguageInterface $language       Language
     *
     * @return ArrayCollection
     */
    public function getBannerByZone($bannerZoneCode, LanguageInterface $language = null)
    {
        $parameters = array(
            'code' => $bannerZoneCode,
        );

        if (!is_null($language)) {
            $parameters['language'] = $language;
        }

        $banners = $this
            ->getEntityManager()
            ->getRepository('ElcodiBannerBundle:Banner')
            ->createQueryBuilder('b')
            ->leftJoin('b.bannerZones', 'bz')
            ->andWhere(
                is_null($language)
                    ? 'bz.language is NULL'
                    : 'bz.language = :language'
            )
            ->andWhere('bz.code = :code')
            ->orderBy('b.position', 'ASC')
            ->setParameters($parameters)
            ->getQuery()
            ->getResult();

        return new ArrayCollection($banners);
    }
}
