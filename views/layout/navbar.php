<section>
	<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
		<div class="container">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/wiki.png" style="width: 80px; height: auto;" alt="Wiki™">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a href="/" class="nav-link">
							<button type="button" class="btn btn-dark ms-3">Home</button>
						</a>
					</li>
					<?php
					if (isset($_SESSION['idUser'])):
						?>
						<li class="nav-item">
							<a href="/logout" class="nav-link">
								<button type="button" class="btn btn-dark ms-3">Logout</button>
							</a>
						</li>
						<?php if ($_SESSION['role'] == 1): ?>
							<li class="nav-item">
								<a href="/dashboard" class="nav-link">
									<button type="button" class="btn btn-dark ms-3">dashboard</button>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($_SESSION['role'] == 2): ?>
							<li class="nav-item">
								<a href="/dashboard/wiki" class="nav-link">
									<button type="button" class="btn btn-dark ms-3">dashboard</button>
								</a>
							<?php endif; ?>
						<?php else: ?>
						<li class="nav-item">
							<a href="/login" class="nav-link">
								<button type="button" class="btn btn-dark ms-3">Sign In</button>
							</a>

						</li>
						<li class="nav-item">
							<a href="/register" class="nav-link">
								<button type="button" class="btn btn-dark ms-3">Get Started</button>
							</a>
						</li>
						<?php
					endif;
					?>
				</ul>
			</div>
		</div>
	</nav>
</section>