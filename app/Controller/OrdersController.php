<?php  

/**
* 
*/
// order list should have ajax for category order (by status)
class OrdersController extends AppController
{	
	public $name = "Orders";
	public $layout = 'mylayout';

	public function index()
	{
		$my_order = $this->Order->find('all',array(
			'conditions' => array(
				'Order.user_id' => $this->Auth->user('user_id')
			)
		));
		$this->set('my_order',$my_order);

		if (!isset($_SESSION['item'])) {
			$this->set('message',1);
			if ($this->request->is('post')) {
				$this->Flash->error(__('Can not purchase with no item'));
			}
		} else {
			if ($_SESSION['item'] == null) {
				$this->set('message',1);
				if ($this->request->is('post')) {
					$this->Flash->error(__('Can not purchase with no item'));
				}
			} else {
				foreach ($_SESSION['item'] as $key => $value) {
					$data[$key]['item_id'] = $key;
					$data[$key]['item_quantity'] = $value['item_quantity'];
					$data[$key]['item_price'] = $value['item_price'];
					$data[$key]['item_name'] = $value['item_name'];
				}
				$this->set('order',$data);
				if ($this->request->is('post')) {
					$order['user_id'] = $this->Auth->user('user_id');
					$order['order_date_time'] = date('Y-m-d');
					$order['order_address'] = $this->request->data['Order']['order_address'];
					$order['status'] = 0;
					$total_price = 0;
					foreach ($_SESSION['item'] as $key => $value) {
						$total_price = $total_price + $value['item_quantity']*$value['item_price'];
					}
					$order['order_total_price'] = $total_price;
					$this->Order->create();
					if ($this->Order->save($order)) {
						foreach ($_SESSION['item'] as $key => $value) {
							//reduce item remain here when purchase
							$item = $this->Order->HaveItem->Item->find('first',array(
								'conditions' => array(
									'Item.item_id' => $key
								)
							));
							$item['Item']['item_remain'] = $item['Item']['item_remain'] - $value['item_quantity'];
							$this->Order->HaveItem->Item->id = $item['Item']['item_id'];
							$this->Order->HaveItem->Item->save($item['Item']);
							//save HaveItem here
							$save = array(
									'order_id' => $this->Order->id,
									'item_id' => $key,
									'item_quantity' => $value['item_quantity'],
									'sale_price' => $value['item_price']
								);
							$this->Order->HaveItem->create();
							$this->Order->HaveItem->save($save);
						}
						unset($_SESSION['item']);
						$this->Flash->success(__('Purchase success'));
						$this->redirect(array(
								'admin' => false,
								'controller' => 'orders',
								'action' => 'index'
							));
					}
				}
			}
		}
	}

	//user delete item from order
	public function delete_item($id)
	{
		unset($_SESSION['item'][$id]);
		$this->redirect(array(
				'admin' => false,
				'controller' => 'orders',
				'action' => 'index'
			));
	}

	//user edit item in order
	public function edit_item($id)
	{
		$this->set('data',$_SESSION['item'][$id]);
		$data = $this->Order->HaveItem->find('first',array(
			'conditions' => array(
				'Item.item_id' => $id
			)
		));	
		if ($this->request->is('post')) {
			if ($this->request->data['Item']['item_quantity'] > $data['Item']['item_remain']) {
				$this->Flash->error(__('Can not make change. Item quantity can not more than item remain.'));
				$this->redirect(array(
					'admin' => false,
					'controller' => 'orders',
					'action' => 'index'
				));
			} else {
				$_SESSION['item'][$id]['item_quantity'] = $this->request->data['Item']['item_quantity'];
				$this->redirect(array(
					'admin' => false,
					'controller' => 'orders',
					'action' => 'index'
				));
			}		
		} 
	}

	public function info($id)
	{
		$data = $this->Order->find('first',
				array(
						'conditions' => array(
								'order_id' => $id
							)
					)
			);
		$this->set('order',$data);
		$item = $this->Order->HaveItem->find('all',
				array(
						'conditions' => array(
								'HaveItem.order_id' => $id
							)
					)
			);
		$this->set('item',$item);
	}

	public function admin_order_info($id)
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
		$data = $this->Order->find('first',
				array(
						'conditions' => array(
								'order_id' => $id
							)
					)
			);
		$this->set('order',$data);
		$item = $this->Order->HaveItem->find('all',
				array(
						'conditions' => array(
								'HaveItem.order_id' => $id
							)
					)
			);
		$this->set('item',$item);
	}

	public function admin_edit_order($id)
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
		$data = $this->Order->HaveItem->find('all',
				array(
						'conditions' => array(
								'HaveItem.order_id' => $id
							)
					)
			);
		$this->set('data',$data);		
	}

	public function admin_order_list()
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
		$list = $this->Order->find('all');
		$this->set('list',$list);
	}

	public function admin_delete_order($id)
	{
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$this->Order->delete($id);
		$this->redirect(array(
				'admin' => true,
				'controller' => 'orders',
				'action' => 'order_list'
			));
	}

	//admin edit item
	public function admin_edit_item($order_id,$have_id)
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
		$data = $this->Order->HaveItem->find('first',
				array(
						'conditions' => array(
								'HaveItem.order_id' => $order_id,
								'HaveItem.id' => $have_id
							)
					)
			);
		$this->set('data',$data);
		if ($this->request->is('post')) {
				$order = $this->Order->find('first',
					array(
						'conditions' => array(
							'Order.order_id' => $order_id
						)
					)
				);
				// change total price of order after delete
				$order['Order']['order_total_price'] = $order['Order']['order_total_price'] - $data['HaveItem']['item_quantity']*$data['HaveItem']['sale_price'] + $this->request->data['HaveItem']['item_quantity']*$data['HaveItem']['sale_price'];
				$this->Order->save($order['Order']);

				$data['HaveItem']['item_quantity'] = $this->request->data['HaveItem']['item_quantity'];
				$this->Order->HaveItem->id = $have_id;
				$this->Order->HaveItem->save($data['HaveItem']);
				$this->redirect(array(
						'admin' => true,
						'controller' => 'orders',
						'action' => 'edit_order',
						$order_id
					));
			}	
	}

	//admin delete an item in order
	public function admin_delete_item($order_id,$have_id)
	{
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$data = $this->Order->HaveItem->find('first',
				array(
						'conditions' => array(
								'HaveItem.order_id' => $order_id,
								'HaveItem.id' => $have_id
							)
					)
			);
		$order = $this->Order->find('first',
					array(
						'conditions' => array(
							'Order.order_id' => $order_id
						)
					)
				);
		//edit total price after edit order
		$order['Order']['order_total_price'] = $order['Order']['order_total_price'] - $data['HaveItem']['item_quantity']*$data['HaveItem']['sale_price'];
		$this->Order->save($order['Order']);
		$this->Order->HaveItem->delete($have_id);
		$this->redirect(array(
				'admin' => true,
				'controller' => 'orders',
				'action' => 'edit_order',
				$order_id
			));
	}

	//statistic of number order, number of item was purchased
	public function admin_statistic()
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
		$data = $this->Order->HaveItem->find('all',array(
				'fields' => array(
						'Item.*',
						'HaveItem.*',
						'Order.*',
						'COUNT(`HaveItem`.`id`) AS count',
						'SUM(`HaveItem`.`item_quantity`) AS sum'
					),
				'group' => array('HaveItem.item_id')
			));
		$this->set('data',$data);

		$order_data = $this->Order->find('all',array(
				'fields' => array(
						'COUNT(`order_id`) AS count',
						'SUM(`order_total_price`) AS total'
					)
			));
		$this->set('order_data',$order_data);
	}

	//change status of order (deliveried or on delivery)
	public function admin_edit_status($id)
	{
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$order = $this->Order->find('first',array(
			'conditions' => array(
				'order_id' => $id
			)
		));		
		$order['Order']['order_status'] = 1 - $order['Order']['order_status'];
		$this->Order->id = $id;
		if ($this->Order->save($order['Order'])) {
			$this->redirect(array(
				'admin' => true,
				'controller' => 'orders',
				'action' => 'order_info',
				$id
			));
		}
	}
}
?>