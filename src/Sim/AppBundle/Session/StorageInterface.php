<?php

namespace Sim\AppBundle\Session;

interface StorageInterface
{
    public function setAdapter($adapter);
    public function get($key);
    public function set($key , $value);
}