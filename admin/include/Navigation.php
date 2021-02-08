
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin-profile.php">Admin <?php echo $_SESSION['first_name']; ?></a>
            </div>
            
            <ul class="nav navbar-right top-nav">
     
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['first_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin-profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                 
                        <li class="divider"></li>
                        <li>
                            <a href="admin-logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
		   
            <div class="side-nav">
              
				<ul class="side-nav nav navbar-nav ">
                    <li>
                        <a href="../front/index.php"><i class="fa fa-fw fa-dashboard"></i> Customer view</a>
                    </li>
                
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> product management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="Add_new_product.php">add new product</a>
                            </li>
                            <li>
                                <a href="catogary_add.php">add catogary</a>
                            </li>
							<li>
                                <a href="approved_post.php">Approved post</a>
                            </li>
                        </ul>
                    </li>
					
					
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> bit points calculation <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="AddBitPoints.php">Add Bit Points</a>
                            </li>
                            <li>
                                <a href="UpdateBitPoints.php">Update Bit Points</a>
                            </li>
							<li>
                                <a href="Display.php">Display Data</a>
                            </li>
							<li>
                                <a href="Search.php">Search Bit points</a>
                            </li>
							<li>
                                <a href="index.php">Manage Offers</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Payment management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="admin_payment.php">payment</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-arrows-v"></i> Supplier management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="approve.php">Give Approvement</a>
                            </li>
                            <li>
                                <a href="imgnew.php">Show Image View</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-arrows-v"></i> customer feedback <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
                                <a href="feedbackadmin.php">feedback admin</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo6"><i class="fa fa-fw fa-arrows-v"></i> Shareholder  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo6" class="collapse">
                            <li>
                                <a href="shmanage.php">Shareholder Management</a>
                            </li>
							<li>
                                <a href="evhandling.php">Event Hnadling</a>
                            </li>
                           
                        </ul>
                    </li>
					<li>
                        <a href="#" data-toggle="collapse" data-target="#demo7"><i class="fa fa-fw fa-arrows-v"></i> Delivery management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo7" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
							<li>
                                <a href="#">Dropdown Item</a>
                            </li>
							<li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
					
					
                </ul>
			</div>	
           
       </nav>