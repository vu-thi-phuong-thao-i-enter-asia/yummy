<?php  

/**
* 
*/
App::uses('AppController', 'Controller');
class ItemsController extends AppController
{

//	public $name = "Items";
	public $uses = array(
		'Item',
		'Category',
		'Product'
	);
	public $layout = "mylayout";
	public $helpers = array("Paginator");

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('detail','search','categories','product','add_to_cart');
        $menu['category'] = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));

        $menu['product'] = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set('menu', $menu);
	}

	function index(){
		$this->layout = "home_layout";
		$data = $this->Item->find('all', array(
            'order' => array('item_id' => 'asc'),
			'group by' => 'category_id',
			'order by' => 'category_id'
		));
		$this->set("data", $data);

	}

	function detail($id){
        $category = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));
        $this->set("category", $category);

        $product = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set("product", $product);
        
		$data = $this->Item->find("first", array(
			"conditions" => array("item_id" => $id)
		));
		$this->set("data", $data);
		$count = $this->Item->Favorite->find('all',array(
			'conditions' => array('Item.item_id' => $id),
			'fields' => array(
				'COUNT(`Favorite`.`id`) AS count'
			)
		));
		$this->set('count',$count);
		$user_id = $this->Auth->user('user_id');
		$like = $this->Item->Favorite->find('first',array(
			'conditions' => array(
				'Favorite.user_id' => $user_id,
				'Favorite.item_id' => $id
			)
		));
		if (isset($user_id)) {
			$this->set('login','1');
		}
		$this->set('like',$like);
	}

	function search(){
        $category = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));
        $this->set("category", $category);

        $product = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set("product", $product);

		$tmp = $_GET["fruit_search"];
		$this->paginate = array(
					'limit' => 6,
					'order' => array('id' => 'asc'),
					"conditions" => array(
						"item_name LIKE" => "%".$tmp."%"
					)
				);
		$data = $this->paginate('Item');
		$this->set("data", $data);
		$this->set("tmp", $tmp);
	}

	function admin_add_item(){
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$this->layout = 'admin';
		if($this->request->is("post")){
			$this->Item->create();
			if(!empty($this->data["Item"]["item_image"]["name"])){
				$file = $this->data["Item"]["item_image"];
				$extension = substr(strtolower(strrchr($file["name"], ".")), 1); 
				$arr_extension = array("jpg", "jpeg", "png");
				if(in_array($extension, $arr_extension)){
					$rand_string = uniqid();
					if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/fruit" . DS . $rand_string . $file["name"])){
						//make image have unique name
						$this->request->data["Item"]["item_image"] = $rand_string . $file["name"];
						$categoryId = $this->Product->find("first", array(
                            'fields' => array('category_id'),
							"conditions" => array("type_id" => $this->request->data["Item"]["type_id"]))
						);
                        $this->request->data["Item"]["category_id"] = $categoryId['Product']['category_id'];
						if($this->Item->save($this->request->data)){
								$this->Flash->success(__('Data has been saved'));
								$this->redirect(array(
									"admin" => true,
									"controller" => "items",
									"action" => "item_list"
								));
						}
						else{
								$this->Flash->error(__('Data could not been saved'));
						}
					}
				}
			}
			else{
				$this->Flash->error(__('Data could not been saved. Please choose image'));
			}
		}
	}

	function admin_edit_item($id){
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$this->layout = 'admin';
		$data = $this->Item->find("first", array(
			"conditions" => array("item_id" => $id)
		));
		$this->set("data", $data);
		if($this->request->is("post")){
			if(!empty($this->data["Item"]["item_image"]["name"])){
				$file = $this->data["Item"]["item_image"];
				$extension = substr(strtolower(strrchr($file["name"], ".")), 1);
				$arr_extension = array("jpg", "jpeg", "png");
				if(in_array($extension, $arr_extension)){
					$rand_string = uniqid();
					if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/fruit" . DS . $rand_string . "edited" . $file["name"])){
						$this->request->data["Item"]["item_id"] = $id;
						$this->request->data["Item"]["item_image"] = $rand_string . "edited" . $file["name"];
                        $categoryId = $this->Product->find("first", array(
                                'fields' => array('category_id'),
                                "conditions" => array("type_id" => $this->request->data["Item"]["type_id"]))
                        );
                        $this->request->data["Item"]["category_id"] = $categoryId['Product']['category_id'];
						if($this->Item->save($this->request->data)){
								$this->Flash->success(__('Data has been saved'));
								$this->redirect(array(
									"admin" => true,
									"controller" => "items",
									"action" => "item_list"
								));
						}
					}
				}
			}
			else{
				$this->request->data["Item"]["item_id"] = $id;
				$this->request->data["Item"]["item_image"] = $data["Item"]["item_image"];
				$this->Item->save($this->request->data["Item"]);
				$this->redirect(array(
					"admin" => true,
					"controller" => "items",
					"action" => "item_list"
				));
			}
		}
	}

	//it is not really delete the item, just make its remain to 0
	function admin_delete_item($id){
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$data = array(
			"item_id" => $id,
			"item_remain" => 0
		);
		$this->Item->delete($data);
		$this->redirect(array(
			"admin" => true,
			"controller" => "items",
			"action" => "item_list"
		));
	}

	function admin_item_list()
	{
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$this->layout = 'admin';		
		$list = $this->Item->find("all");
		$this->set('list',$list);
	}

	//ajax function add item to order
	function add_to_cart()
	{
		if (!$this->Auth->loggedIn()) {
			echo "Can not purchase. You must login to purchase";
			exit();
		}
		$item_id = $this->request->data['item_id'];
		$item_quantity = $this->request->data['item_quantity'];
		$data = $this->Item->find('first',array(
				'conditions' => array(
						'item_id' => $item_id
					)
			));
		if ($item_quantity > $data['Item']['item_remain']) {
			echo "Can not add to order!";
			echo "\n";
			echo "Item remain is not enough for order!";
		} else {
			$item_price = $data['Item']['item_price'];
			$item_name = $data['Item']['item_name'];
			$info = array(
					'item_quantity' => $item_quantity,
					'item_price' => $item_price,
					'item_name' => $item_name
				);
			$_SESSION['item'][$item_id] = $info;
			echo "Added to order!";
			echo "\n";
			echo "ID: ".$item_id." Quantity: ".$item_quantity." Sale Price: ".$item_price;
		}	
		exit();
	}

    function product($param){

        $typeID = $this->Product->find("first", array(
            'conditions' => array(
            	"Product.type_id" => $param
			)
        ));
        $this->set("type", $typeID['Product']['type_name']);
        $this->paginate = array(
            'limit' => 6,
            'order' => array('id' => 'asc'),
            "conditions" => array(
                "Item.type_id" => $param
            )
        );
        $data = $this->paginate('Item');
        $this->set("data", $data);
    }

    function categories($param){

        $categoryID = $this->Category->find("first", array(
            'conditions' => array(
                "Category.category_id" => $param
            )
        ));
        $this->set("nameCategory", $categoryID['Category']);
        $this->paginate = array(
            'limit' => 6,
            'order' => array('id' => 'asc'),
            "conditions" => array(
                "Item.category_id" => $param
            )
        );
        $data = $this->paginate('Item');
        $this->set("data", $data);
    }
}
?>






