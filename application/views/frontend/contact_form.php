<div class="form_contact row wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="10" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
	<div class="col-lg-8 ">

		<div id="contact_form">
			<form id="form_contact" name="form_contact" method="post" action="/frontend/Contact/request_form" novalidate="novalidate">
				<div class="form-group">
					<label for="ContactFormName">Name</label>
					<input id="name" name="full_name" type="text" maxlength="250" value="" class="form-control" placeholder="Name">
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="ContactFormPhone">Phone Number</label>
						<input id="phone" name="phone" type="text" maxlength="250" value="" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-group col-md-6">
						<label for="ContactFormEmail">Email</label>
						<input id="email" name="email" type="text" maxlength="250" value="" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="ContactFormMessage">Message</label>
					<textarea id="content" name="content" class="form-control" rows="5" placeholder="Message"></textarea>
				</div>
				<div class="row-btn">
					<div class="form-group">
						<input type="hidden" name="do_submit" value="1">
						<button type="submit" class="btn btn-contact">
							Send
						</button>
						<span class="note"></span>
					</div>
				</div>

				<div class="col-12 d-none">
					<div class="form-group">
						<input name="address" type="text" maxlength="250" value="" class="form-control" placeholder="Địa chỉ">
					</div>
				</div>
				<div class="col-12 d-none">
					<div class="form-group">
						<input name="title" type="text" maxlength="250" value="Find and Contact us in" class="form-control" placeholder="">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="title">CONTACT</div>

		<ul>
			<li class="name">Ms. Minh Hiếu</li>
			<li class="phone">(+84) 902700025</li>
			<li class="email">etl.taxagent@gmail.com</li>
		</ul>
	</div>
</div>
