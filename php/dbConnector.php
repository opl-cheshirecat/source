<?php

  function dbConnect() {

    $host = 'mysql415.db.sakura.ne.jp';
    $id = 'oplan-inc';
    $pass = 'oplaninc0213';
    $db = 'oplan-inc_cheshirecat';

    return new mysqli($host, $id, $pass, $db);

  }

 ?>
