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
 * Hetzner Cloud ServerType Traits.
 */
trait ServerType
{
    /**
     * Get all Server Types
     *
     * @see https://docs.hetzner.cloud/#server-types-get-all-server-types
     *
     * @return void
     */
    public function getAllServerTypes()
    {
        return $this->action('GET', 'server_types');
    }

    /**
     * Get a Server Type
     *
     * @see https://docs.hetzner.cloud/#server-types-get-a-server-type
     *
     * @param string $id
     *
     * @return void
     */
    public function getServerType($id)
    {
        return $this->action('GET', 'server_types/' . $id);
    }

    /**
     * Get all ServerTypes Result Markdown Table
     *
     * @param boolean $tableShow
     *
     * @return void
     */
    public function getAllServerTypesTable($tableShow = true)
    {
        $getData   = json_decode($this->getAllServerTypes(), true);
        $tableData = null;

        foreach ($getData['server_types'] as $data) {
            $tableData[] = [
                'id'            => $data['id'],
                'name'          => $data['name'],
                'cores'         => $data['cores'],
                'memory'        => $data['memory'],
                'disk'          => $data['disk'],
                'storageType'   => $data['storage_type'],
                'cpuType'       => $data['cpu_type'],
                'pricesHourly'  => str_replace('0000000', '', $data['prices'][0]['price_hourly']['net']),
                'pricesMonthly' => str_replace('00000000', '', $data['prices'][0]['price_monthly']['net']),
            ];
        }

        // generate table cli if tableShow true
        if ($tableShow) {
            $table = new CliTable;
            $table->setTableColor('green');
            $table->setHeaderColor('yellow');
            $table->addField('ID', 'id', false, 'white');
            $table->addField('Name', 'name', false, 'white');
            $table->addField('Cores', 'cores', false, 'white');
            $table->addField('memory', 'memory', false, 'white');
            $table->addField('Disk', 'disk', false, 'white');
            $table->addField('Storage Type', 'storageType', false, 'white');
            $table->addField('CPU Type', 'cpuType', false, 'white');
            $table->addField('Price Hourly', 'pricesHourly', false, 'white');
            $table->addField('Price Monthly', 'pricesMonthly', false, 'white');
            $table->injectData($tableData);
            $table->display();
        } else {
            return $tableData;
        }
    }
}
