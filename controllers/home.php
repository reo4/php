<?php

$user = $db->query('select * from users where id = :id', ['id' => 1])->findOrFail();

authorize($user['id'] == 1);


view('home', [
    'hello' => 'Hello World!'
]);
