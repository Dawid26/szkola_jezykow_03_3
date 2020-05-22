<?php
$hasloReset = null;
$hasloReset = 'test';
$haslo_hash = password_hash($hasloReset, PASSWORD_DEFAULT);
echo $haslo_hash;