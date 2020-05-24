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

namespace VCManager;

use Exception;
use VCManager\Traits\Server;

class HetznerCloud
{
    use Server;

    /**
    * Default Curl Timeout.
    *
    * @var int
    *
    * @see https://www.php.net/manual/en/function.curl-setopt
    */
    protected $timeout;

    /**
     * Default API Url.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * API Token.
     *
     * @var string
     */
    protected $token;

    /**
     * Custom Request Header.
     *
     * @var array
     */
    protected $customHeader;

    /**
     * Construct Function.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        // Custom URL API if any
        $this->apiUrl = $data['url'] ?? 'https://api.hetzner.cloud/v1';

        // Custom Set Timeout
        $this->timeout = $data['timeout'] ?? 30;

        // Set Token
        $this->token = $data['token'];

        // Set Custom Header
        $this->customHeader = $data['headers'] ?? null;
    }

    /**
     * Curl Post or Get Function.
     *
     * @param string $type
     * @param string $url
     * @param array  $form
     *
     * @return void
     */
    private function action($type, $url, $form = null)
    {
        // setup url
        $buildUrl = $this->apiUrl . '/' . $url;

        // set default header
        $headers   = [];
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer ' . $this->token;

        // use custom header if not null
        if ($this->customHeader) {
            $headers = $this->customHeader;
        }

        // build curl instance
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $buildUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYSTATUS, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // check action type
        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $form);
        } elseif ($type == 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $form);
        } elseif ($type == 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        } else {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        }

        // running curl
        $result = curl_exec($ch);

        // throw error
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        // stop connection
        curl_close($ch);

        // return result request
        return $result;
    }
}
