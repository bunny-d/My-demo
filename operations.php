<?php
include 'db/db.php';
class operations{
	private $categoryId;

	public function  __construct($a){
		$this->categoryId = $a;		
	}
	public function create($dbArr){
		$dbaseObj = new dbase($this->categoryId,'create');
		$dbaseArr = $dbaseObj->action($dbArr);
	}
	public function deletes($row){
		$dbaseObj = new dbase($this->categoryId,'delete');
		$dbaseArr = $dbaseObj->action($row);
        }
	public function view(){
		$dbaseObj = new dbase($this->categoryId,'view');
		$dbaseArr = $dbaseObj->action(0);
		return ($dbaseArr);
        }

	public function edit($dbArr){
		$dbaseObj = new dbase($this->categoryId,'edit');
		$dbaseArr = $dbaseObj->action($dbArr);
        }

	public function change(){
		echo "in master branch";
	}
}
?>
