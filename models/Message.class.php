<?php
	class Message 
	{
		private $id;
		private $user;
		private $message;
		private $date;

		public function getId()
		{
			return $this->id;
		}
		public function getUser()
		{
			return $this->user;
		}
		public function getMessage()
		{
			return $this->message;
		}
		public function getDate()
		{
			return $this->date;
		}

		public function setUser($string)
		{
			if (strlen($string) < 4)
				throw new Exception("Pseudo trop court");
			else if (strlen($string) > 31) 
				throw new Exception("Pseudo trop long");
			$this->user = $string;
		}
		public function setMessage($string)
		{
			if (strlen($string) < 1)
				throw new Exception("Message trop court");
			else if (strlen($string) > 511) 
				throw new Exception("Message trop long");
			$this->message = $string;
		}
	}
?>