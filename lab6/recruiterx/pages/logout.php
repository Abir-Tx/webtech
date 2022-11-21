<?php
session_start();
session_unset();
session_destroy();
header('Location: /webtech/lab6/recruiterx');
