<?php
	require_once("mailchimp/MCAPI.class.php");
	$mcapi = new MCAPI('c94a1d38b6683d601a324aeeb4d4ffe3-us1');
	//$mcapi = new MCAPI('ВСТАВЬТЕ СВІЙ API КЛЮЧ СЮДИ...');
	$lists = $mcapi->lists();

	if($lists) {
		$merge_vars = Array('EMAIL' => $_REQUEST['mc_email']);
		$list_id = '314bbca712';
		//$list_id = 'ВСТАВЬТЕ СВІЙ ДІЮЧИЙ LIST ID...';
	
		if($mcapi->listSubscribe($list_id, $_REQUEST['mc_email'], $merge_vars ) ):
			echo '<div class="dt-sc-success-box"><i class="fa fa-check-circle"></i><strong>Успішно!</strong>Перевірьте свою почту або спам щоб підтвердити ссилку</div>';
		else:
			echo '<div class="dt-sc-error-box"><i class="fa fa-times-circle"></i><strong>Помилка!</strong>Перевірте свій поштовий id.</div>';
		endif;
	}
	else {
		echo '<span class="error-msg"><b>Помилка:</b>&nbsp;Mailchimp API не працює.</span>';
	}
?>