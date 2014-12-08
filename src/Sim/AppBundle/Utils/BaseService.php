<?php

namespace Sim\AppBundle\Utils;

class BaseService
{
    public $service_contaier;
    public function __construct($service_container)
    {
        $this->service_contaier = $service_container;
    }

    public function get($service)
    {
        return $this->service_contaier->get($service);

    }
}