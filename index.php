<?php

include "core/libs/load.php";
Session::set("current_dir","sign_in");
Load::common("header");
Load::body("sign_in","main");
Load::common("scripts");