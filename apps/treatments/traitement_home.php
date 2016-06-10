<?php
	if (isset($_POST['user']))
	{
		if (isset($_POST['message']))
		{
			try
			{
				$messageManager = new MessageManager($link);
				$messageManager->create($_POST);
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
			}
		}
		else
			$error = "Missing parameter : message";
	}
?>