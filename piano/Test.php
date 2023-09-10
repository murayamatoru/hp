<?php
require_once dirname(__FILE__) . '/util/Logger.php';
require_once dirname(__FILE__) . '/util/StringUtil.php';
require_once dirname(__FILE__) . '/services/EngineerService.php';
require_once dirname(__FILE__) . '/models/Engineer.php';
require_once dirname(__FILE__) . '/models/SearchContext.php';


// $engineerService = new EngineerService();
// for($count = 20; $count >= 1; $count--){
// 	$engineer = new Engineer();
// 	$engineer->setDisplayName("表示名" . $count);
// 	$engineer->addSkill("1001");
// 	$engineer->setMailAddress("a" . $count . "@a.com");
// 	if ($count >= 10){
// 		$engineer->setFreeWord("ドメイン駆動設計");
// 	}
// 	$engineerService->addOrReplaceEngineer($engineer);
// 	sleep(2);
// 	echo ("count=" . $count . "\n");
// }
