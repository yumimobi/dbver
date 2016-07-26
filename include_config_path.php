<?php

foreach (glob("config/*.php") as $configFile) {
    include $configFile;
}