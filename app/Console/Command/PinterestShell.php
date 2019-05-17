<?php 
App::import('Vendor', 'autoload', array('file' => 'Pinterest/autoload.php'));
// use DirkGroenen\Pinterest;
/**
* 
*/
class PinterestShell extends AppShell
{
	public function main() {
		// require "../autoload.php";

		$pinterest = new DirkGroenen\Pinterest\Pinterest('4942934139654386583', 'e3a393f1d9ff60743131381f0b705f68731307476035f21f9cc638f511c49e27');

		$pinterest->auth->setOAuthToken('AZBSwkuG2_HYBkgHSYPQv39ZobGZFQY-16Eju-5EmNb9a6A4OwAAAAA');

		//$result = $pinterest->boards->get('650629546105782937');
//		$result = $pinterest->users->getMeFollowers();
        $result = $pinterest->following->unfollowUser('technology');
		$this->log(var_dump($result));
		
	}
}
?>
