<?php

$db = new PDO(
  "mysql:host=den1.mysql6.gear.host;dbname=journalx;charset=utf8", //source
  "journalx",   //username
  "#Vizzit#8772",   //password
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);
