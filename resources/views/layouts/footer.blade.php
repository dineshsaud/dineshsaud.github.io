<footer class="blog-footer bg-info" style="padding: unset;padding-top: 48px;">
	<div class="container" >
		<div class="row">
			<div class="col-md-5">
				<div class="py-2">
					<span class="text-white h2">{{ config('app.name') }}</span>
					<p class="text-white h6">&nbsp;We inspire people's art.</p>
				</div>
				<nav>
					<ul class="list-inline text-white mb-0">
						<li class="list-inline-item">Home</li>
						<li class="list-inline-item">Shipping Methods</li>
						<li class="list-inline-item">About Us</li>
						<li class="list-inline-item">Contact Us</li>
					</ul>
				</nav>
			</div>
			<div class="col-md-3">
				<div class="py-2">
					<ul class="list-unstyled text-white mb-0">
						<li>Forum</li>
						<li>Associations</li>
						<li>Privacy Policy</li>
						<li>Terms &amp; Condition</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 d-flex">
				<div class="m-auto">
					<h5 class="text-center text-white">Connect with us.</h5>
					<span class="d-block text-center text-white">
						<i class="fab fa-facebook fa-2x pr-2"></i>
						<i class="fab fa-instagram fa-2x pr-2"></i>
						<i class="fab fa-google-plus fa-2x pr-2"></i>
						<i class="fab fa-twitter fa-2x"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
	<section class="py-2 bg-dark">
		<span class="d-block text-center text-white">
			Copyrights &copy; {{date('Y')}}, {{ config('app.name') }}.
		</span>
	</section>
</footer>
<script type="text/javascript" src="{{asset('js/mixed.js')}}"></script>