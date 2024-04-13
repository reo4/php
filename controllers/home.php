<?php

$user = $db->query('select * from users where id = :id', ['id' => 1])->findOrFail();

authorize($user['id'] == 1);

require base_path('views/home.view.php');
