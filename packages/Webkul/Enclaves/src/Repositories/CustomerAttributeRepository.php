<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\CustomerAttribute;

class CustomerAttributeRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return CustomerAttribute::class;
    }
}
