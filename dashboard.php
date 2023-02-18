<?php

include "core/libs/load.php";
Session::set("current_dir","dashboard");

Load::common("header");
Load::common("navbar");
Load::body("dashboard","main");
Load::common("footer");
Load::common("scripts");