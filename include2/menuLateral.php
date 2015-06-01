
				<div class="menu-lateral span3">
					<div class="profile-pic">
						<img class="img-circle" class="span12 profile-pic" src="<?php echo $user_data['profile'] ?>" alt="">
					</div>

					<ul class="unstyled user_data">
						<li><?php echo $user_data['first_name'] ?></li>
						<li>INFORMÁTICA, IFRN</li>
					</ul>

					<ul class="nav nav-pills nav-stacked nav-bar-lateral">
		              <li class=""><a href="profile.php?username=<?php echo $user_data['username']?>">Perfil</a></li>
		              <li><a href="#">Amigos</a></li>
		              <li><a href="#">Mensagens <span class="badge">42</span></a></li>
		            </ul>	
				</div>