<?php
	class MessageManager
	{
		private $link;

		public function __construct($link)
		{
			$this->link = $link;
		}

		public function findAll()
		{
			$list = [];
			$request = "SELECT * FROM message";
			$res = mysqli_query($this->link, $request);
			while($message = mysqli_fetch_object($res, "Message"))
				$list[] = $message;
			return $list;
		}
		public function findById($id)
		{
			$id = intval($id);
			$request = "SELECT * FROM message WHERE id=".$id;
			$res = mysqli_query($this->link, $request);
			$message = mysqli_fetch_object($res, "Message");
			return $message;
		}
		public function findByUser($user)
		{
			$list = [];
			$request = "SELECT * FROM message WHERE user='".$user."'";
			$res = mysqli_query($this->link, $request);
			while ($message = mysqli_fetch_object($res, "Message"))
				$list[] = $message;
			return $list;
		}

		public function create($data)
		{
			if (!isset($data['user']))
				throw new Exception("Missing parameter : user");
			if (!isset($data['message']))
				throw new Exception("Missing parameter : message");
			$message = new Message;
			$message->setUser($data['user']);
			$message->setMessage($date['message']);

			$user = mysqli_real_escape_string($this->link, $message->getUser());
			$message = mysqli_real_escape_string($this->link, $message->getMessage());
			$request = "INSERT INTO message (user, message)
						VALUES ('".$user."', '".$message."')";
			$res = mysqli_query($this->link, $request);

			if ($res)
			{
				$id = mysqli_insert_id($this->link);
				if ($id)
				{
					$message = $this->findById($id);
					return $message;
				}
				else
					throw new Exception("Error Processing Request");	
			}
			else
				throw new Exception("Error Processing Request");
		}
	}
?>