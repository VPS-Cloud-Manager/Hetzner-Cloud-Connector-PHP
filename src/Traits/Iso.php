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
 * Hetzner Cloud Iso Traits.
 */
trait Iso
{
    /**
     * Get all ISOs
     *
     * @see https://docs.hetzner.cloud/#isos-get-all-isos
     *
     * @return void
     */
    public function getAllIsos()
    {
        return $this->action('GET', 'isos');
    }

    /**
     * Get an ISO
     *
     * @see https://docs.hetzner.cloud/#isos-get-an-iso
     *
     * @param string $id
     *
     * @return void
     */
    public function getIso($id)
    {
        return $this->action('GET', 'isos/' . $id);
    }
}
