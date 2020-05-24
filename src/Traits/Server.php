<?php
/**
 * Hetzner Cloud Connector PHP SDK.
 *
 * @version     1.0.0
 *
 * @see         https://github.com/VPS-Cloud-Manager/Hetzner-Cloud-Connector-PHP
 *
 * @author      VCManager <me@juniyadi.id>
 * @copyright   2020 VCManager
 */

namespace VCManager\Traits;

/**
 * Hetzner Cloud Server Traits.
 */
trait Server
{
    /**
     * Get All Servers.
     *
     * @see https://docs.hetzner.cloud/#servers-get-all-servers
     *
     * @param array|null $query
     *
     * @return void
     */
    public function getAllServers($query = null)
    {
        $url = 'servers';

        if (is_array($query)) {
            $url = 'servers?'.http_build_query($query);
        }

        return $this->action('GET', $url);
    }

    /**
     * Get Server.
     *
     * @see https://docs.hetzner.cloud/#servers-get-a-server
     *
     * @param string $id
     *
     * @return void
     */
    public function getServer($id)
    {
        return $this->action('GET', 'servers/'.$id);
    }
}
