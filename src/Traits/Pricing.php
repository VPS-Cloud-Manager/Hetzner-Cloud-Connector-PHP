<?php

namespace VCManager\Traits;

trait Pricing
{
    /**
     * Get All Prices
     *
     * @see https://docs.hetzner.cloud/#pricing-get-all-prices
     *
     * @param array|null $query
     *
     * @return void
     */
    public function getAllPrices($query = null)
    {
        $url = 'pricing';

        if (is_array($query)) {
            $url = 'pricing?' . http_build_query($query);
        }

        return $this->action('GET', $url);
    }

    /**
     * Get All Prices Simple Result
     *
     * @return void
     */
    public function getAllPriceSimple()
    {
        $getAllPrices = json_decode($this->getAllPrices(), true);
        $simplePrice  = null;

        // looping all prices in server types
        foreach ($getAllPrices['pricing']['server_types'] as $price) {
            // get prices based by datacenter
            $priceByDatacenter = null;
            foreach ($price['prices'] as $priceByDC) {
                $priceByDatacenter = [
                    'location' => $priceByDC['location'],
                    'hourly'   => $priceByDC['price_hourly']['net'] . ' ' . $getAllPrices['pricing']['currency'],
                    'montly'   => $priceByDC['price_monthly']['net'] . ' ' . $getAllPrices['pricing']['currency'],
                ];
            }

            // build simple price array
            $simplePrice[] = [
                'id'    => $price['id'],
                'name'  => $price['name'],
                'price' => $priceByDatacenter,
            ];
        }

        return $simplePrice;
    }
}
