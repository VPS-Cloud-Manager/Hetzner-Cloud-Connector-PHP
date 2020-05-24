<?php

namespace VCManager\Traits;

trait Server
{
    /**
     * Get All Servers
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
            $url = 'servers?' . http_build_query($query);
        }

        return $this->action('GET', $url);
    }

    /**
     * Get Server
     *
     * @see https://docs.hetzner.cloud/#servers-get-a-server
     *
     * @param string $id
     *
     * @return void
     */
    public function getServer($id)
    {
        return $this->action('GET', 'servers/' . $id);
    }
}
