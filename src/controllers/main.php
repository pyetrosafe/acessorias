<?php

$sql = 'SELECT * from clients';

$pagination = new Pagination($sql);
$clients = $pagination->paginate();
$navPage = $pagination->nav();

$_view['yeld'] = 'views/nav.php';
