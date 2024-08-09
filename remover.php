<?php

require "banco.php";

removerTarefa($conn, $_GET['id']);

header('location: index.php');
