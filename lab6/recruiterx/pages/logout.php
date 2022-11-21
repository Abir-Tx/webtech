<?php
session_start();
session_unset();
session_destroy();
header('Location: /webtech/lab4/recruiterx');
