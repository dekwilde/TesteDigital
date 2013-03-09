<body>
 
	<div id="layout">
		<div id="header-wrapper">
			<div id="header">
				<div id="user-wrapper" class="fixed">
					<div class="color-scheme">
						<a href="#" class="button">Dropdown suggestion</a>
					</div>
					<div class="user">
						<img src="_content/user-img.png" alt="" />
						<span>Welcome <a href="#">Owsian !</a></span>
						<span class="logout"><a href="#">Logout</a></span>
					</div>
				</div>
		
				<div id="launcher-wrapper" class="fixed">
					<div class="logo">
						<a href="index.html"><img src="_content/blank-logo.png" alt="" /></a>
					</div>
			
					<div class="launcher">
						<ul class="fixed">
							<li class="users"><a href="#">Users</a></li>
							<li class="mailbox">
								<a href="#">Mailbox</a>
								<span class="red-bullet"></span>
							</li>
							<li class="dialog"><a href="#">Dialog</a></li>
							<li class="settings last"><a href="#">Settings</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>    
		<div class="page fixed">
			<div id="sidebar">
				<ul id="navigation">
					<li class="first<?php if($side_menu == "dashboard"){ echo "active"; } ?>">
						<div><a href="index.php">Dashboard</a><span class="icon-nav dashboard"></span></div>
						<div class="back"></div>
					</li>
					<li class="<?php if($side_menu == "prova"){ echo "active"; } ?>">
						<div><a href="prova-list.php">Provas</a><span class="icon-nav form-elements"></span></div>
						<div class="back"></div>
					</li>  
					<li class="<?php if($side_menu == "category"){ echo "active"; } ?>">
						<div><a href="category-list.php?mode=<?php echo  $mode; ?>">Categorias</a><span class="icon-nav form-elements"></span></div>
						<div class="back"></div>
					</li> 
					<li class="<?php if($side_menu == "question"){ echo "active"; } ?>">
						<div><a href="question-list.php?mode=<?php echo  $mode; ?>">Questões</a><span class="icon-nav form-elements"></span></div>
						<div class="back"></div>
					</li>
					
					<li>
						<div><a href="calendar.html">Calendar</a><span class="icon-nav calendar"></span><span>125</span></div>
						<div class="back"></div>
					</li>
					<li>
						<div><a href="interface-elements.html">Interface Elements</a><span class="icon-nav interface-elements"></span></div>
						<div class="back"></div>
					</li>

					<li>
						<div><a href="#">Settings</a><span class="icon-nav settings"></span></div>
						<div class="back"></div>
					</li>
					<li>
						<div><a href="typography.html">Typography</a><span class="icon-nav typography"></span></div>
						<div class="back"></div>
					</li>
					<li>
						<div><a href="tables.html">Tables</a><span class="icon-nav tables"></span></div>
						<div class="back"></div>
					</li>
					<li>
						<div><a href="gallery.html">Gallery</a><span class="icon-nav gallery"></span></div>
						<div class="back"></div>
					</li>
					<li class="last">
						<div><a href="#">Users</a><span class="icon-nav users"></span></div>
						<div class="back"></div>
					</li>
				</ul>
			</div>