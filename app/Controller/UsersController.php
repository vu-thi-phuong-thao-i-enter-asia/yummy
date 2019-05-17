<?php 

/**
* 
*/
App::uses('SmtpTransport', '../../lib/Cake/Network/Email');
App::uses('CakeEmail', '../../lib/Cake/Network/Email');
//todo list
class UsersController extends AppController
{
	public $name = "Users";
	public $layout = 'mylayout';
    public $uses = array(
        'Category',
        'Product'
    );
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register','fblogin','check_exist','contact');
        $menu['category'] = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));

        $menu['product'] = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set('menu', $menu);
	}	

	public function register()
	{
		$this->layout = "login_layout";		
		if (!session_id()) {
            session_start();
        } 
		if ($this->request->is('post')) {
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				if (!$this->User->checkExist($this->request->data['User']['user_email'])) {
					$this->User->create();
					$this->User->save($this->request->data);
					$new_user = $this->request->data['User'];
					$id = $this->User->id;
					$new_user = array_merge(
							$new_user,
							array('user_id' => $id)
						);
					unset($new_user['user_password']);
					$this->Auth->login($new_user);
					$this->redirect($this->Auth->redirectUrl());
				} else {
					$this->Flash->error(__('This email has been used'));
				}
			}			
		}
	}

	public function check_exist()
	{
		$email = $this->request->data['email'];
		if ($this->User->checkExist($email)) {
			echo "This email has been used. Please choose other email";
		} else {
			echo "";
		}
		exit();
	}

	public function login()
	{
		$this->layout = "login_layout";
		if (!session_id()) {
            session_start();
        } 
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error(__('Invalid username or password, try again'));
			}
		}
		//login with facebook
		$fb = new \Facebook\Facebook([
		  'app_id' => FACEBOOK_APP_ID,
		  'app_secret' => FACEBOOK_APP_SECRET,
		  'default_graph_version' => 'v2.10',
		]);
		$helper = $fb->getRedirectLoginHelper();
		$loginUrl = $helper->getLoginUrl(FACEBOOK_REDIRECT_URI,array('email','public_profile','user_friends'));
		$this->set('fbloginUrl',$loginUrl);
	}

	public function admin_login()
	{
		$this->redirect(array(
			'admin' =>false,
			'controller' => 'users',
			'action' => 'login'
		));
	}

	public function fblogin()
	{
		if (!session_id()) {
            session_start();
        }
        $fb = new \Facebook\Facebook([
		  'app_id' => FACEBOOK_APP_ID,
		  'app_secret' => FACEBOOK_APP_SECRET,
		  'default_graph_version' => 'v2.10',
		]); 
        $helper = $fb->getRedirectLoginHelper();
		if (isset($_GET['error_reason'])) {
			$this->redirect(
				array(
						'admin' => false,
						'controller' => 'users',
						'action' => 'login'
					)
			);
		}	
		try {
			if (isset($_SESSION['facebook_access_token'])) {
				$accessToken = $_SESSION['facebook_access_token'];
			} else {
		  		$accessToken = $helper->getAccessToken();
			}
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		 	echo 'Graph returned an error: ' . $e->getMessage();
		  	exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  	exit;
		}		

		if (isset($accessToken)) {
			if (isset($_SESSION['facebook_access_token'])) {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				$oAuth2Client = $fb->getOAuth2Client();
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			try {
				// get user FB profile
				$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
				$profile = $profile_request->getGraphNode()->asArray();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				session_destroy();
				return $this->redirect(array('action' => 'fblogin'));
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			$this->set('profile',$profile);
		}

		$user = $this->User->find('first',
				array(
						'conditions' => array(
								'user_email' => $profile['email']
							)
					)
			);

		//if user exist => login
		// if user not exist => create user and then login
		if (empty($user)) {
			$this->User->create();
			$new_user = array(
					'user_email' => $profile['email'],
					'user_password' => uniqid(true),
					'user_fullname' => $profile['name'],
					'user_role' => 1
				);
			if ($this->User->save($new_user)) {
				$id = $this->User->id;
				$new_user = array_merge(
						$new_user,
						array('user_id' => $id)
					);
				unset($new_user['user_password']);
				$this->Auth->login($new_user);
				$this->redirect($this->Auth->redirectUrl());	
			}
		} else {
			unset($user['User']['user_password']);
			$this->Auth->login($user['User']);
			$this->redirect($this->Auth->redirectUrl());
		}
	}

	public function logout()
	{
		unset($_SESSION['item']);
		return $this->redirect($this->Auth->logout());
	}

	public function profile()
	{
		$id = $this->Auth->user('user_id');
		$data = $this->User->find('first',array(
				'conditions' => array('user_id' => $id)
			));
		$this->set('data',$data);
	}

	//edit profile then login user again with their new profile
	public function edit()
	{
		$id = $this->Auth->user('user_id');
		$profile = $this->User->find('first',array(
				'conditions' => array('user_id' => $id)
			));
		$this->set('data',$profile);
		if ($this->request->is('post')) {
			$this->User->id = $id;
			$new_profile = 	$this->request->data['User'];
			if (!$new_profile['user_avatar']['error']) {
						$filename = uniqid().$new_profile['user_avatar']['name'];
						move_uploaded_file($new_profile['user_avatar']['tmp_name'], WWW_ROOT . 'img' . DS . 'user_avatar' .DS. $filename);
						$new_profile['user_avatar'] = $filename;
			} else {
				$new_profile['user_avatar'] = $profile['User']['user_avatar'];
			}
			if ($this->User->save($new_profile)) {
				$new_profile['user_id'] = $id;
				$new_profile['user_role'] = $profile['User']['user_role'];
				$this->Auth->login($new_profile);
				$this->redirect(array(
						'admin' =>false,
						'controller' => 'users',
						'action' => 'profile'
					));				
			}
		}
	}

	public function change_password()
	{
		$id = $this->Auth->user('user_id');
		$user = $this->User->find('first',array(
				'conditions' => array('user_id' => $id)
			));
		$this->set('data',$user);
		$passwordHash = $user['User']['user_password'];
		if ($this->request->is('post')) {
			$data = $this->request->data['User'];
			$this->User->set($this->request->data);
			
			if (!$this->User->validates()) {
				$this->Flash->error(__('Can\' change password. New password must be between 8 and 15 character.'));
			} else {
				if ($data['user_new_password'] != $data['user_confirm_password']) {
				$this->Flash->error(__('Confirm password doesn\'t match. Please confirm again'));
				} else {
					$newHash = Security::hash($this->request->data['User']['user_old_password'], 'blowfish', $passwordHash);
					if ($newHash == $passwordHash) {
						$user['User']['user_password'] = $data['user_new_password'];
						$this->User->id = $id;
						$this->User->save($user);
						$this->redirect(array(
								'admin' => false,
								'controller' => 'users',
								'action' => 'profile'
							));
					} else {
						$this->Flash->error(__('Wrong password. Please enter the right password'));
					}
				}
			}	
		}
	}

	public function favorite()
	{
		$id = $this->Auth->user('user_id');
		$options['joins'] = array(
				array(
						'table' => 'favorites',
						'type' => 'inner',
						'alias' => 'Favorite',
						'conditions' => array(
								'User.user_id = Favorite.user_id'
							)
					),
				array(
						'table' => 'items',
						'type' => 'inner',
						'alias' => 'Item',
						'conditions' => array(
								'Favorite.item_id = Item.item_id'
							)
					)
			);

		$options['conditions'] = array(
				'User.user_id' => $id
			);

		$options['fields'] = array(
				'User.*',
				'Item.*'
			);
		$favorite = $this->User->find('all',$options);
		$this->set('data',$favorite);
	}

	//ajax like item for detail page
	public function add_favorite()
	{
		$id = $this->Auth->user('user_id');
		$item_id = $this->request->data['item_id'];
		$check_like = $this->User->Favorite->find('first',array(
			'conditions' => array(
				'Favorite.user_id' => $id,
				'Favorite.item_id' => $item_id 
			)
		));
		$count_like = $this->User->Favorite->find('all',array(
			'fields' => array(
				'User.*',
				'COUNT(`Favorite`.`id`) AS count'
			),
			'conditions' => array(
				'Favorite.item_id' => $item_id
			)
		));
		$count = $count_like['0']['0']['count'];
		if (empty($check_like)) {
			$add_favorite = array(
					'user_id' => $id,
					'item_id' => $item_id
				);
			$this->User->Favorite->create();
			$this->User->Favorite->save($add_favorite);
			echo "<strong>You and ".$count." other people like this product.</strong>";
		} else {
			$data = $this->User->Favorite->find('first',
				array(
					"conditions" => array(
						'Favorite.user_id' => $id,
						'Favorite.item_id' => $item_id
					)
				)
			);
			$id = $data['Favorite']['id'];
			$this->User->Favorite->delete($id);
			echo '<strong>'.($count - 1)." people like this product.</strong>";
		}	
		exit();
	}
	
	public function admin_dashboard()
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
	}

	public function admin_user_list()
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
		$list = $this->User->find('all');
		$this->set('list',$list);
	}

	public function admin_add_user()
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
		if ($this->request->is('post')) {
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				if (!$this->User->checkExist($this->request->data['User']['user_email'])) {
					$this->User->save($this->request->data['User']);
					$this->redirect(
							array(
									'admin' => true,
									'controller' => 'users',
									'action' => 'user_list'
								)
						);
				} else {
					$this->Flash->error(__('Can\'t add this user, user email has been used.'));
				}
			} else {
				$this->Flash->error(__('Can\'t add this user, username and password must be valid.'));
			}		
		}
	}

	public function admin_edit_role($id)
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
		$profile = $this->User->find('first',
				array(
						'conditions' => array('user_id' => $id)
					)
			);
		$this->set('data',$profile);
		if ($this->request->is('post')) {
			$this->User->id = $id;
			$this->User->save($this->request->data['User']);
			$this->redirect(array(
					'admin' => true,
					'controller' => 'users',
					'action' => 'user_list'
				));
		}
	}

	public function admin_delete_user($id)
	{
		if ($this->Auth->user('user_role') == 1) {
			$this->Flash->error(__('You have no admin permission'));
			$this->redirect(array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			));
		}
		$this->User->delete($id,true);
		$this->redirect(array(
				'admin' => true,
				'controller' => 'users',
				'action' => 'user_list'
			));
	}

	function contact(){
        if(isset($_POST['submit'])){
            $to = "phuongthao94gtvt@gmail.com"; // this is your Email address
            $from = $_POST['email']; // this is the sender's Email address
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $message = $_POST['message'];
            $Email = new CakeEmail('gmail');
            $Email->from($from);
            $Email->to($to);
            $Email->subject('Thư khách hàng '. $first_name . $last_name . ' liên hệ');
            $Email->send($message);
            echo "send mail success";
        }

	}
}
?>