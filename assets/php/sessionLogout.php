<?php

session_start();
session_destroy();

header('Location: ../../?state=' . rand(100, 900));

?>