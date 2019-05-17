<?php
//echo $this->Html->script('item.js');
?>
<div class="sidebar-nav">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav" id="sidenav01">
                <?php
                    foreach ($menu['category'] as $key => $result):
                ?>
                <li>
                    <a data-toggle="collapse" data-target="#toggleDemo<?php echo $key ?>" data-parent="#sidenav01" class="collapsed">
                        <?php echo $result['Category']['category_name'] ?><span class="caret pull-right"></span>
                    </a>
                    <div class="collapse" id="toggleDemo<?php echo $key ?>" style="height: 0px;">
                        <ul class="nav nav-list">
                            <?php
                                foreach ($menu['product'] as $type):
                                    if($result['Category']['category_id'] === $type['Product']['category_id']) :
                            ?>
                            <li id="<?php echo $type['Product']['type_id'] ?>">
                                <a href="/items/product/<?php echo $type['Product']['type_id']; ?>"><?php echo $type['Product']['type_name']; ?></a>
                            </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<style>
    #sidenav01 a {
        font: 16px Arial;
    }
    .nav-list a {
        background-color: #f7f4ff;
    }
    .nav-list {
        border: 1px solid #dedede;
    }
    .nav-list > li {
        border-bottom: 1px solid #dedede;
    }
    /* make sidebar nav vertical */
    @media (min-width: 768px){
        .affix-content .container {
            width: 700px;
        }

        html,body{
            background-color: #f8f8f8;
        }
        .affix-content .container .page-header{
            margin-top: 0;
        }
        .affix-sidebar{
            padding-right:0;
            font-size:small;
            padding-left: 0;
        }
        .affix-row {
            height: 100%;
            margin-left: 20px;
            margin-right: 0;
        }

        .sidebar-nav {
            margin-top: 20px;
        }

        .sidebar-nav .navbar .navbar-collapse {
            padding: 0;
            max-height: none;
        }
        .sidebar-nav .navbar{
            border-radius:0;
            margin-bottom:0;
            border:0;
        }
        .sidebar-nav .navbar ul {
            float: none;
            display: block;
        }
        .sidebar-nav .navbar li {
            float: none;
            display: block;
        }
        .sidebar-nav .navbar li a {
            padding-top: 12px;
            padding-bottom: 12px;
        }
    }

    @media (min-width: 1220px){
        .affix-row{
            overflow: hidden;
        }
        .navbar-nav {
            margin: 0;
        }
        .navbar-collapse{
            padding: 0;
        }
        .sidebar-nav .navbar li a:hover {
            background-color: #428bca;
            color: white;
        }
        .sidebar-nav .navbar li a > .caret {
            margin-top: 8px;
        }
    }
</style>