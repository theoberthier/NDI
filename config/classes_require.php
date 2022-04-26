<?php

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require getcwd() . VENDORS_PATH . 'PHPMailer/src/Exception.php';
require getcwd() . VENDORS_PATH . 'PHPMailer/src/PHPMailer.php';
require getcwd() . VENDORS_PATH . 'PHPMailer/src/SMTP.php';


require getcwd() . "/components/models/_database.php";
require getcwd() . '/components/models/Array2Form.php';
require getcwd() . '/components/models/Notifications.php';
require getcwd() . '/components/models/BBCode.php';
require getcwd() . '/components/models/Crypter.php';
require getcwd() . '/components/models/File.php';
require getcwd() . '/components/models/FormatorGenerator.php';
require getcwd() . '/components/models/Html2Pdf.php';
require getcwd() . '/components/models/Instagram.php';
require getcwd() . '/components/models/JWToken.php';
require getcwd() . '/components/models/Logs.php';
require getcwd() . '/components/models/Mail.php';
require getcwd() . '/components/models/User.php';
require getcwd() . '/components/models/Youtube.php';
require getcwd() . '/components/models/Zip.php';
require getcwd() . '/components/models/Person.php';
require getcwd() . '/components/models/Boat.php';
require getcwd() . '/components/models/Saving.php';
require getcwd() . '/components/models/Search.php';