<?php
/**
 * Hetzner Cloud Connector PHP SDK.
 *
 * @see         https://github.com/VPS-Cloud-Manager/Hetzner-Cloud-Connector-PHP
 *
 * @author      VCManager <me@juniyadi.id>
 * @copyright   2020 VCManager
 */

namespace VCManager\Traits;

/**
 * Hetzner Cloud Location Traits.
 */
trait Location
{
    /**
     * Get all Locations
     *
     * @see https://docs.hetzner.cloud/#locations-get-all-locations
     *
     * @return void
     */
    public function getAllLocations()
    {
        return $this->action('GET', 'locations');
    }

    /**
     * Get a Location
     *
     * @see https://docs.hetzner.cloud/#locations-get-a-location
     *
     * @param string $id
     *
     * @return void
     */
    public function getLocation($id)
    {
        return $this->action('GET', 'locations/' . $id);
    }
}
