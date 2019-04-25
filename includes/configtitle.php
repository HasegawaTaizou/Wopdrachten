<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/info.php":
			$CURRENT_PAGE = "Info";
			$PAGE_TITLE = "Info";
			break;
      case "/Service.php":
        $CURRENT_PAGE = "Service";
        $PAGE_TITLE = "Service";
        break;
        case "/Login.php":
				$CURRENT_PAGE = "Login";
				$PAGE_TITLE = "Login";
          break;
						case "/herhaalrecept.php":
						$CURRENT_PAGE = "herhaalrecept";
						$PAGE_TITLE = "herhaalrecept";
							break;
							case "/nieuw.php":
							$CURRENT_PAGE = "register";
							$PAGE_TITLE = "register";
								break;
								case "/bestel.php":
								$CURRENT_PAGE = "bestel";
								$PAGE_TITLE = "bestel";
								case "/product.php":
							  $CURRENT_PAGE = "bestel";
							  $PAGE_TITLE = "bestel";
									break;
		default:
		$CURRENT_PAGE = "Home";
		$PAGE_TITLE = "Home";
	}
?>
