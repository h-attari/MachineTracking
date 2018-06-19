<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=computers', 'krish', 'mu');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);