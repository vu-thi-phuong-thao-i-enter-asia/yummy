<div class="container">
<h1>Trang quản trị</h1>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-user fa-lg" aria-hidden="true"></i> Quản lý người dùng</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">
              	<i class="fa fa-user-plus text-info" aria-hidden="true"></i>
              	<?php  
              		echo $this->Html->link('Thêm người dùng', array(
              				'admin' => true,
              				'controller' => 'users',
              				'action' => 'add_user'
              			));
              	?>
              </li>
              <li class="list-group-item">
              	<i class="fa fa-users text-info"></i>
              	<?php  
              		echo $this->Html->link('Danh sách người dùng', array(
              				'admin' => true,
              				'controller' => 'users',
              				'action' => 'user_list'
              			));
              	?>
              </li>
            </ul>
          </div>
        </div>
          <!-- ---- -->
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-tasks fa-lg" aria-hidden="true"></i> Quản lý danh mục</a>
                  </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                  <ul class="list-group">
                      <li class="list-group-item">
                          <i class="fa fa-user-plus text-info" aria-hidden="true"></i>
                          <?php
                          echo $this->Html->link('Thêm danh mục', array(
                              'admin' => true,
                              'controller' => 'categories',
                              'action' => 'add_category'
                          ));
                          ?>
                      </li>
                      <li class="list-group-item">
                          <i class="fa fa-users text-info"></i>
                          <?php
                          echo $this->Html->link('Danh sách các mục', array(
                              'admin' => true,
                              'controller' => 'categories',
                              'action' => 'category_list'
                          ));
                          ?>
                      </li>
                  </ul>
              </div>
          </div>
          <!-- ---- -->

          <!-- ---- -->
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i> Quản lý loại sản phẩm</a>
                  </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                  <ul class="list-group">
                      <li class="list-group-item">
                          <i class="fa fa-user-plus text-info" aria-hidden="true"></i>
                          <?php
                          echo $this->Html->link('Thêm loại sản phẩm', array(
                              'admin' => true,
                              'controller' => 'products',
                              'action' => 'add_product'
                          ));
                          ?>
                      </li>
                      <li class="list-group-item">
                          <i class="fa fa-users text-info"></i>
                          <?php
                          echo $this->Html->link('Danh sách loại sản phẩm', array(
                              'admin' => true,
                              'controller' => 'products',
                              'action' => 'product_list'
                          ));
                          ?>
                      </li>
                  </ul>
              </div>
          </div>
          <!-- ---- -->

          <!-- ---- -->
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i> Quản lý ảnh</a>
                  </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                  <ul class="list-group">
                      <li class="list-group-item">
                          <i class="fa fa-user-plus text-info" aria-hidden="true"></i>
                          <?php
                          echo $this->Html->link('Thêm ảnh', array(
                              'admin' => true,
                              'controller' => 'images',
                              'action' => 'add_image'
                          ));
                          ?>
                      </li>
                      <li class="list-group-item">
                          <i class="fa fa-users text-info"></i>
                          <?php
                          echo $this->Html->link('Danh sách ảnh', array(
                              'admin' => true,
                              'controller' => 'images',
                              'action' => 'image_list'
                          ));
                          ?>
                      </li>
                  </ul>
              </div>
          </div>
          <!-- ---- -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><i class="fa fa-star fa-lg" aria-hidden="true"></i> Quản lý sản phẩm</a>
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">
              	<i class="fa fa-plus text-info" aria-hidden="true"></i>
              	<?php  
              		echo $this->Html->link('Thêm sản phẩm', array(
              				'admin' => true,
              				'controller' => 'items',
              				'action' => 'add_item'
              			));
              	?>
              </li>
              <li class="list-group-item">
              	<i class="fa fa-list text-info"></i>
              	<?php  
              		echo $this->Html->link('Danh sách sản phẩm', array(
              			'admin' => true,
              			'controller' => 'items',
              			'action' => 'item_list'
              			));
              	?>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> Quản lý đơn</a>
            </h4>
          </div>
          <div id="collapse6" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">
              	<i class="fa fa-shopping-basket text-info" aria-hidden="true"></i>
              	<?php  
              		echo $this->Html->link('Danh sách ', array(
              				'admin' => true,
              				'controller' => 'orders',
              				'action' => 'order_list'
              			));
              	?>
              </li>
              <li class="list-group-item">
              	<i class="fa fa-area-chart text-info"></i>
              	<?php  
              		echo $this->Html->link('Thống kê', array(
              			'admin' => true,
              			'controller' => 'orders',
              			'action' => 'statistic'
              			));
              	?>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Quản lý bài viết</a>
            </h4>
          </div>
          <div id="collapse7" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">
                <i class="fa fa-newspaper-o text-info" aria-hidden="true"></i>
                <?php  
                  echo $this->Html->link('Thêm bài viết', array(
                      'admin' => true,
                      'controller' => 'posts',
                      'action' => 'add_post'
                    ));
                ?>
              </li>
              <li class="list-group-item">
                <i class="fa fa-pencil-square-o text-info"></i>
                <?php  
                  echo $this->Html->link('Danh sách bài viết', array(
                    'admin' => true,
                    'controller' => 'posts',
                    'action' => 'post_list'
                    ));
                ?>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
    <div class="col-sm-9 col-md-9">
       <?php  
        echo $this->fetch('content');
       ?>
    </div>
  </div>
</div>