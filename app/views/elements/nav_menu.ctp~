<header class="navbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">

	 <div class="container-fluid">

		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a id="home" class="navbar-brand" href="<?php e($this->webroot)?>" alt="Landing Page" title="<?php e(languaje($languaje)['landingPage']);?>" data-toggle="tooltip" data-placement="bottom">
				<i class="fa fa-home"></i>
			</a>
			
			<a class="navbar-brand" href="<?php e($this->webroot);?>"><?php e(languaje($languaje)['appName']);?></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
<!--             <li><a href="#">Dashboard</a></li> -->
<!--             <li><a href="#">Settings</a></li> -->
<!--             <li><a href="#">Profile</a></li> -->
            <li><a href="#" data-toggle="modal" data-target="#myModal">Ayuda</a></li>
          </ul>
							<ul class="nav navbar-nav pull-right panel-menu">
<!--								<li class="hidden-xs">
									<a href="index.html" class="modal-link">
										<i class="fa fa-bell"></i>
										<span class="badge">7</span>
									</a>
								</li>
								<li class="hidden-xs">
									<a class="ajax-link" href="ajax/calendar.html">
										<i class="fa fa-calendar"></i>
										<span class="badge">7</span>
									</a>
								</li>
								<li class="hidden-xs">
									<a href="ajax/page_messages.html" class="ajax-link">
										<i class="fa fa-envelope"></i>
										<span class="badge">7</span>
									</a>
								</li>-->

<!--								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
								</li>-->

								<li class="dropdown">
									<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
<!--										<div class="avatar">
											<img src="img/avatar.jpg" class="img-circle" alt="avatar" />
										</div>-->
										<i class="fa fa-angle-down pull-right"></i>
										<div class="user-mini pull-right">
											<span class="welcome"><?php e(languaje($languaje)['welcomeMsg']);?></span>
											<span>
												<?php e($message = ( !empty($_SESSION['Auth']['User']) ? $_SESSION['Auth']['User']['username'] : languaje($languaje)['guestUser'] )); ?>
											</span>
										</div>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php e($this->webroot.'Users');?>">
												<i class="fa fa-user"></i>
												<span><?php e(languaje($languaje)['navMenuA']);?></span>
											</a>
										</li>
										<li>
											<a href="<?php e($this->webroot.'Groups');?>" class="ajax-link">
												<i class="fa fa-envelope"></i>
												<span><?php e(languaje($languaje)['navMenuB']);?></span>
											</a>
										</li>
										<li>
											<a href="<?php e($this->webroot.'Policies/view');?>" class="ajax-link">
												<i class="fa fa-picture-o"></i>
												<span><?php e(languaje($languaje)['navMenuC']);?></span>
											</a>
										</li>
										<li>
											<a href="<?php e($this->webroot.'Downloads');?>" class="ajax-link">
												<i class="fa fa-tasks"></i>
												<span><?php e(languaje($languaje)['navMenuD']);?></span>
											</a>
										</li>
										<li>
											<a href="<?php e($this->webroot.'Users/logout');?>">
												<i class="fa fa-power-off"></i>
												<span><?php e(languaje($languaje)['navMenuE']);?></span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
<!--			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
				<i class="fa fa-search"></i>
			</form>-->
        </div>
      </div>
    </nav>
</header>