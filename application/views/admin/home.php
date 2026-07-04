Ecomerce Page show<br />

<?php 
		$getCurrentLi=$this->router->fetch_class().$this->router->fetch_method();
		$getCurrentPranet=$this->router->fetch_class();
		 if($getCurrentLi=='siteecommerce'){echo 'active';}
		 
		 echo '<br>';
		 print_r($this->db->database);
	?>