<?php
	$messageManager = new MessageManager($link);
	$messages = $messageManager->findAll();
	$i = 0;
	while ($i < count($messages))
	{
		require 'views/contents/display_message.phtml';
		$i++;
	}
?>