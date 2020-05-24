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

use jc21\CliTable;

/**
 * Hetzner Cloud Datacenter Traits.
 */
trait Datacenter
{
    /**
     * Get all Datacenters
     *
     * @see https://docs.hetzner.cloud/#datacenters-get-all-datacenters
     *
     * @return void
     */
    public function getAllDatacenters()
    {
        return $this->action('GET', 'datacenters');
    }

    /**
     * Get a Datacenter
     *
     * @see https://docs.hetzner.cloud/#datacenters-get-a-datacenter
     *
     * @param [type] $id
     * @return void
     */
    public function getDatacenter($id)
    {
        return $this->action('GET', 'datacenters/' . $id);
    }

    /**
     * Get all Datacenters Result Markdown Table
     *
     * @param boolean $tableShow
     *
     * @return void
     */
    public function getAllDatacentersTable($tableShow = true)
    {
        $getData   = json_decode($this->getAllDatacenters(), true);
        $tableData = null;

        foreach ($getData['datacenters'] as $data) {
            $tableData[] = [
                'id'           => $data['id'],
                'name'         => $data['name'],
                'locationId'   => $data['location']['id'],
                'locationName' => $data['location']['name'],
                'description'  => $data['description'],
            ];
        }

        // generate table cli if tableShow true
        if ($tableShow) {
            $table = new CliTable;
            $table->setTableColor('green');
            $table->setHeaderColor('yellow');
            $table->addField('Datacenter ID', 'id', false, 'white');
            $table->addField('Datacenter Name', 'name', false, 'white');
            $table->addField('Location ID', 'locationId', false, 'red');
            $table->addField('Location Name', 'locationName', false, 'red');
            $table->addField('Description', 'description', false, 'green');
            $table->injectData($tableData);
            $table->display();
        } else {
            return $tableData;
        }
    }
}
