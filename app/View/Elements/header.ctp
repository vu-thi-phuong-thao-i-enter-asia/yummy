<div class="navbar navbar-default navbarnew" role="navigation" style="margin-bottom: 0px;">

  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <?php
              echo $this->Html->image('myimg/logo.jpg',
                  array(
                      'url' => array(
                      'admin' => false,
                      'controller' => 'items',
                      'action' => 'index'
                      ),
                      'class' => 'yummy-logo pull-left'
                      )
              );
          ?>
      </div>
      <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
          <li>
            <?php
                echo $this->Html->link(
                    "TRANG CHỦ",
                    array(
                        "admin" => false,
                        "controller" => "items",
                        "action" => "index"
                    )
                );
            ?>
          </li>

          <li>
            <?php
              echo $this->Html->link(
                "GIỚI THIỆU",
                array(
                  "admin" => false,
                  "controller" => "items",
                  "action" => "index"
                )
              );
            ?>
          </li>
          <!-- Drop Down Menu Gạch Men -->
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">THIẾT BỊ VỆ SINH<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <?php
                  foreach($menu['category'] as $result):
                    if($result['Category']['category_id'] != 9):
                  ?>
                      <li>
                          <a href="/items/categories/<?php echo $result['Category']['category_id']; ?>"><?php echo $result['Category']['category_name']; ?></a>
                      </li>
                  <?php
                    endif;
                  endforeach;
                  ?>
              </ul>
          </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">GẠCH<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <?php
                      foreach($menu['product'] as $product):
                        if($product['Product']['category_id'] == 9):
                      ?>
                          <li>
                              <a href="/items/categories/<?php echo $product['Product']['category_id']; ?>"><?php echo $product['Product']['type_name']; ?></a>
                          </li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                  </ul>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">SƠN MYKOLOR<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <?php
                      foreach($menu['product'] as $product):
                        if($product['Product']['category_id'] == 10):
                      ?>
                      <li>
                          <a href="/items/categories/<?php echo $product['Product']['category_id']; ?>"><?php echo $product['Product']['type_name']; ?></a>
                      </li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                  </ul>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">THIẾT BỊ NHÀ BẾP<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <?php
                      foreach($menu['product'] as $product):
                        if($product['Product']['category_id'] == 10):
                      ?>
                      <li>
                          <a href="/items/categories/<?php echo $product['Product']['category_id']; ?>"><?php echo $product['Product']['type_name']; ?></a>
                      </li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                  </ul>
              </li>

          <li>
              <?php
                echo $this->Html->link(
                  "THƯ VIỆN ẢNH",
                      array(
                      "admin" => false,
                      "controller" => "images",
                      "action" => "index"
                      )
                  );
              ?>
          </li>

          <li>
            <?php
                echo $this->Html->link(
                    "LIÊN HỆ",
                    array(
                        "admin" => false,
                        "controller" => "users",
                        "action" => "contact"
                    )
                );
            ?>
          </li>

        </ul>

          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown navbar-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php
                      if (empty($current_user)) {
                        echo "GUEST";
                      } else {
                        echo $current_user["user_fullname"];
                      }
                  ?>
                  <span class="caret"></span>&nbsp;&nbsp
              </a>
              <ul class="dropdown-menu" role="menu">
                <?php
                  if (empty($current_user)) {
                    echo "<li>";
                      echo $this->Html->link("Đăng nhập", array(
                        'admin' => false,
                        'controller' => 'users',
                        'action' => 'login'
                      ));
                    echo "</li>";
                    echo "<li>";
                      echo $this->Html->link("Đăng ký", array(
                        'admin' => false,
                        'controller' => 'users',
                        'action' => 'register'
                      ));
                    echo "</li>";
                  } else {
                    if (isset($current_user['user_role'])) {
                      if ($current_user['user_role'] == 0) {
                        echo "<li>";
                          echo $this->Html->link('Quản trị viên', array(
                            'admin' => true,
                            'controller' => 'users',
                            'action' => 'dashboard'
                          ));
                        echo "</li>";
                        echo '<li class="divider"></li>';
                      }
                    }

                    echo "<li>";
                      echo $this->Html->link(
                        "Profile",
                        array(
                          "admin" => false,
                          "controller" => "users",
                          "action" => "profile"
                        )
                      );
                    echo "</li>";
                    echo "<li>";
                      echo $this->Html->link(
                        "My Favorites",
                        array(
                          "admin" => false,
                          "controller" => "users",
                          "action" => "favorite"
                        )
                      );
                    echo "</li>";
                    echo "<li>";
                      echo $this->Html->link(
                        "Đăng xuất",
                        array(
                          "admin" => false,
                          "controller" => "users",
                          "action" => "logout"
                        )
                      );
                    echo "</li>";
                  }
                ?>
              </ul>
           </li>
           <!-- Avatar -->

          <?php
            if (isset($current_user)) {
                if (isset($current_user["user_avatar"])) {
                  echo $this->Html->image("user_avatar/" . $current_user["user_avatar"], array(
                    "class" => "img-circle navbar-right",
                    "id" => "account-icon"
                  ));
                } else {
                  echo $this->Html->image("user_avatar/" . 'default.png', array(
                    "class" => "img-circle navbar-right",
                    "id" => "account-icon"
                  ));
                }
            }
          ?>

        </ul>
          <?php
              echo $this->Form->create('Item',
                  array(
                      'url' => array(
                          'admin' => false,
                          'controller' => 'items',
                          'action' => 'search'
                          ),
                      'class' => 'navbar-form navbar-right',
                      'type' => 'get'
                      )
              );
          ?>
          <div class="form-group">
              <input id="search" type="text" class="form-control" name="fruit_search" placeholder="Search...">
          </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          <?php
                echo $this->Form->end();
          ?>
      </div>
  </div>

</div>
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<style>
    .navbarnew {
        margin-bottom: 0px;
        position: relative;
        right: 0;
        left: 0;
        z-index: 1030;
    }

</style>