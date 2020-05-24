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
use jc21\CliTableManipulator;

/**
 * Hetzner Cloud Images Traits.
 */
trait Images
{
    /**
     * Get all Images
     *
     * @see https://docs.hetzner.cloud/#images-get-all-images
     *
     * @param array|null $query
     *
     * @return void
     */
    public function getAllImages($query = null)
    {
        $url = 'images';

        if (is_array($query)) {
            $url = 'images?' . http_build_query($query);
        }

        return $this->action('GET', $url);
    }

    /**
     * Get an Image
     *
     * @see https://docs.hetzner.cloud/#images-get-an-image
     *
     * @param string $id
     *
     * @return void
     */
    public function getImage($id)
    {
        return $this->action('GET', 'images/' . $id);
    }

    /**
     * Update an Image
     *
     * @see https://docs.hetzner.cloud/#images-update-an-image
     *
     * @param string $id
     * @param array $data
     *
     * @return void
     */
    public function updateImage($id, $data)
    {
        return $this->action('PUT', 'images/' . $id, json_encode($data));
    }

    /**
     * Delete an Image
     *
     * @see https://docs.hetzner.cloud/#images-delete-an-image
     *
     * @param string $id
     *
     * @return void
     */
    public function deleteImage($id)
    {
        return $this->action('DELETE', 'images/' . $id);
    }

    /**
     * Get all Images Result Markdown Table
     *
     * @param boolean $tableShow
     *
     * @return void
     */
    public function getAllImagesTable($tableShow = true)
    {
        $getData   = json_decode($this->getAllImages(), true);
        $tableData = null;

        foreach ($getData['images'] as $data) {
            $tableData[] = [
                'id'           => $data['id'],
                'name'         => $data['name'],
                'status'       => $data['status'],
                'description'  => $data['description'],
                'created'      => $data['created'],
            ];
        }

        // generate table cli if tableShow true
        if ($tableShow) {
            $table = new CliTable;
            $table->setTableColor('green');
            $table->setHeaderColor('yellow');
            $table->addField('ID', 'id', false, 'white');
            $table->addField('Name', 'name', false, 'white');
            $table->addField('Status', 'status', false, 'white');
            $table->addField('Description', 'description', false, 'white');
            $table->addField('Created', 'created', false, 'white');
            $table->injectData($tableData);
            $table->display();
        } else {
            return $tableData;
        }
    }
}
