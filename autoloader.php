<?php

spl_autoload_register(function ($class) {
    require base_path("$class.php");
});
