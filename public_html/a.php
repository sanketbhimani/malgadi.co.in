<?php


$SALT = "";
$list_item = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
foreach ($list_item as $item) {
  echo $item;
}
echo("<br>");
$hashSequence = "ZST1Bz|7eba8c93c7437c9a8aa6|9150|Techtonics Items|test|snk.bhimani.jnd@gmail.com||||||||||";
$hashVarsSeq = explode('|', $hashSequence);
$hash_string = '';	
foreach($hashVarsSeq as $hash_var) {
	$hash_string .= $hash_var;
    $hash_string .= '|';
}
$hash = strtolower(hash('sha512', $hash_string));
foreach($list_item as $item1){
	foreach($list_item as $item2){
		foreach($list_item as $item3){
			foreach($list_item as $item4){
				foreach($list_item as $item5){
					foreach($list_item as $item6){
						foreach($list_item as $item7){
							foreach($list_item as $item8){
								$SALT = $item1.$item2.$item3.$item4.$item5.$item6.$item7.$item8;
								$hash_string_cpy = $hash_string;
								$hash_string_cpy .= $SALT;
								//echo($hash_string_cpy);
								$hash = strtolower(hash('sha512', $hash_string));
								if($hash==="bab906a76cc6c41a51b0cd27edd795520490d6dd6c0bda4ab30d831041fbed71b82c1135b334d4b823536a12cbbea8bfab33984b8b027b99267f9a3e6e72c95a"){
									echo ($hash);
									die();
								}
							}
						}
					}
				}
			}
		}
	}
}
?>
