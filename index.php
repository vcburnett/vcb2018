<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport" />
<title>TITLE</title>
<link rel="shortcut icon" href="assets/images/favicon.png"/>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Titillium+Web:400,600" rel="stylesheet">

</head>

<body>

	<header>
		<div class="wrapper-full">
			<nav>
				<a href="javascript:void(0);">What I Do</a>
				<a href="javascript:void(0);">Portfolio</a>
				<a href="javascript:void(0);">About Me</a>
				<a href="javascript:void(0);">Say Hello</a>
			</nav>
			<div id="vcb-header-logo">
				<img src="assets/images/vcb-logo-lines.svg" alt="Victor Burnett">
			</div>
		</div>
	</header>

	<section id="hp-intro">
		<div class="content-front">

		</div>
		<div class="content-square">

		</div>
	</section>

	<section id="hp-services">
		<div class="content-text">

		</div>
		<div class="content-full-width">

		</div>
	</section>

	<section id="hp-portfolio">

	</section>

	<section id="hp-about">
		<div class="content-front">

		</div>
	</section>

	<section id="contact">
		<div class="contact-wrapper">
			<div class="contact-form">
				<h1 id="h1-contact">Say Hello</h1>
				<p>Use the form below to contact me about... well, basically anything, from projects to comments. Or send me jokes. I love jokes.</p>
				<form>
					<span class="input input--hoshi">
						<input class="input__field input__field--hoshi" type="text" />
						<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
							<span class="input__label-content input__label-content--hoshi">Name</span>
						</label>
					</span>
					<span class="input input--hoshi">
						<input class="input__field input__field--hoshi" type="text" />
						<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-4">
							<span class="input__label-content input__label-content--hoshi">Email</span>
						</label>
					</span>
					<span class="input input--hoshi">
						<textarea class="input__field input__field--hoshi" type="text" /></textarea>
						<label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-4">
							<span class="input__label-content input__label-content--hoshi">Name</span>
						</label>
					</span>
					<input type="submit" value="Send message">
				</form>
			</div>
		</div>
	</section>

	<footer>
		<div class="wrapper-1024">
			<p>&copy;2017 Victor Burnett. All rights reserved.</p>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( '.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
	<!-- end Scripts -->

</body>
</html>