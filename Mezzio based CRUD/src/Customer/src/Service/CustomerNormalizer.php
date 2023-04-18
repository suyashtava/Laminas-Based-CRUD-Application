<?php

declare(strict_types=1);

namespace Customer\Service;

use Customer\Model\Customer;

class CustomerNormalizer
{
    public function normalize(Customer $customer): array
    {
        return [
             'id' => $customer->getid(),
                    'name' => $customer->getname(),
                    'brewery_id' => $customer->getbrewery_id(),
                    'cat_id' => $customer->getcat_id(),

                    'style_id' => $customer->getstyle_id(),
                    'abv' => $customer->getabv(),
                    'ibu' => $customer->getibu(),
                    'srm' => $customer->getsrm(),
                    'upc' => $customer->getIdString(),
                    'descript' => $customer->getupc(),
                    'add_user' => $customer->getadd_user(),
                    //$this->last_mod = $customerData['last_mod'];
                    'last_mod' => $customer->getlast_mod()?->format('Y-m-d H:i')
        ];
    }

    public function denormalize(array $customerData): Customer
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen(Customer::class),
            Customer::class,
            strstr(serialize($customerData), ':')
        ));
    }
}
