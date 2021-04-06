<?php

interface DatabaseInterface {
    public function getConfig();
    public function setConfig(Config $config);
}
