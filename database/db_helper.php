<?php
require_once ('config.php');
class DB{
	protected $data;
	function execute($sql) {
		$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, $sql);
		mysqli_close($con);
	}
	
	function executeResult($sql) {
		$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		$result = mysqli_query($con, $sql);
		if ($result != null) {
			while ($row = mysqli_fetch_array($result, 1)) {
				$this->data[] = $row;
			}
		}
		mysqli_close($con);
	
		return $this->data;
	}
}
$db = new DB();
?>