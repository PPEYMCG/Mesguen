<?php


echo "	<!DOCTYPE html>
<html>
<style>
@import url('font-awesome.min.css');
@import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');

/*
	Solarize by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

/* Basic */

	body {
		background: #FEFEFE;
	}

		body.loading * {
			-moz-transition: none !important;
			-webkit-transition: none !important;
			-o-transition: none !important;
			-ms-transition: none !important;
			transition: none !important;
			-moz-animation: none !important;
			-webkit-animation: none !important;
			-o-animation: none !important;
			-ms-animation: none !important;
			animation: none !important;
		}

	body, input, select, textarea {
		color: #003366;
		font-family: 'Open Sans', sans-serif;
		font-size: 12pt;
		font-weight: 300;
		line-height: 1.55em;
	}

	a {
		color: #003366;
		text-decoration: underline;
	}

	strong, b {
		font-weight: 700;
	}

	em, i {
		font-style: italic;
	}

	p, ul, ol, dl, table, blockquote {
		margin: 0 0 2em 0;
	}

	p {
		line-height: 1.8em;
	}

		p.medium {
			font-size: 1.4em;
		}

	h1, h2, h3, h4, h5, h6 {
		color: inherit;
		font-weight: 700;
	}

		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
			color: inherit;
			text-decoration: none;
		}

	h2 {
		font-size: 1.5em;
	}

	h3 {
		font-size: 1.25em;
	}

	sub {
		font-size: 0.8em;
		position: relative;
		top: 0.5em;
	}

	sup {
		font-size: 0.8em;
		position: relative;
		top: -0.5em;
	}

	hr {
		border-top: solid 1px #003366;
		border: 0;
		margin-bottom: 1.5em;
	}

	blockquote {
		border-left: solid 0.5em #003366;
		font-style: italic;
		padding: 1em 0 1em 2em;
	}

	section.special, article.special {
		text-align: center;
	}

	header.major {
		padding-bottom: 3em;
		text-align: center;
		text-transform: uppercase;
	}

		header.major h2 {
			font-size: 2.6em;
			font-weight: 700;
		}

		header.major .byline {
			display: block;
			padding-top: 1em;
			letter-spacing: 1px;
			font-size: 1.4em;
		}

	footer > :last-child {
		margin-bottom: 0;
	}

	footer.major {
		padding-top: 3em;
	}

/* Form */

	input[type='text'],
	input[type='password'],
	input[type='email'],
	textarea {
		-moz-appearance: none;
		-webkit-appearance: none;
		-o-appearance: none;
		-ms-appearance: none;
		appearance: none;
		background: none;
		border: solid 1px #82b440;
		color: inherit;
		display: block;
		outline: 0;
		padding: 0.75em;
		text-decoration: none;
		width: 14.5%;
	}

		input[type='text']:focus,
		input[type='password']:focus,
		input[type='email']:focus,
		textarea:focus {
			border-color: #003366;
		}

	input[type='text'],
	input[type='password'],
	input[type='email'] {
		line-height: 1em;
	}

	::-webkit-input-placeholder {
		color: inherit;
		opacity: 0.5;
		position: relative;
		top: 3px;
	}

	:-moz-placeholder {
		color: inherit;
		opacity: 0.5;
	}

	::-moz-placeholder {
		color: inherit;
		opacity: 0.5;
	}

	:-ms-input-placeholder {
		color: inherit;
		opacity: 0.5;
	}

	.formerize-placeholder {
		color: rgba(85, 85, 85, 0.5) !important;
	}

/* Image */

	.image {
		border: 0;
		position: relative;
	}

		.image.fit {
			display: block;
		}

			.image.fit img {
				display: block;
				width: 100%;
			}

		.image.feature {
			display: block;
			margin: 0 0 2em 0;
		}

			.image.feature img {
				display: block;
				width: 100%;
			}

/* Icon */

	.icon {
		position: relative;
	}

		.icon:before {
			content: '';
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-transform: none !important;
		}

		.icon > .label {
			display: none;
		}

/* Lists */

	ol.default {
		list-style: decimal;
		padding-left: 1.25em;
	}

		ol.default li {
			padding-left: 0.25em;
		}

	ul.default {
		margin: 0;
		padding: 0;
		list-style: none;
	}

		ul.default li {
			padding: 0.40em 0em;
		}

	ul.icons {
		cursor: default;
		padding-bottom: 2em;
	}

		ul.icons li {
			display: inline-block;
			line-height: 1em;
			padding: 0.5em 1em;
		}

			ul.icons li:first-child {
				padding-left: 0;
			}

			ul.icons li span {
				display: none;
			}

			ul.icons li a {
				text-decoration: none;
				font-size: 2em;
				color: inherit;
				opacity: 0.2;
				-moz-transition: all 0.35s ease-in-out;
				-webkit-transition: all 0.35s ease-in-out;
				-o-transition: all 0.35s ease-in-out;
				-ms-transition: all 0.35s ease-in-out;
				transition: all 0.35s ease-in-out;
			}

			ul.icons li a:hover {
				color: inherit;
				opacity: 1;
			}

	ul.actions {
		cursor: default;
	}

		ul.actions:last-child {
			margin-bottom: 0;
		}

		ul.actions li {
			display: inline-block;
			padding: 0 0 0 1.5em;
		}

			ul.actions li:first-child {
				padding: 0;
			}

		ul.actions.vertical li {
			display: block;
			padding: 1.5em 0 0 0;
		}

			ul.actions.vertical li:first-child {
				padding: 0;
			}

	ul.special-icons {
		margin: 0em;
		padding: 0em;
	}

		ul.special-icons > li {
			position: relative;
			padding: 0.50em 0em 0.50em 0em;
		}

		ul.special-icons > li:before {
			position: absolute;
			left: 0;
			top: 2em;
			display: block;
			background: none;
			font-size: 2em;
			border-radius: 5px;
		}

		ul.special-icons > li:first-child {
			border-top: none;
		}

		ul.special-icons h3 {
			margin-bottom: 0.80em;
			line-height: 2em;
			text-transform: uppercase;
			font-weight: 700;
			font-size: 1.2em;
		}

		ul.special-icons span {
			line-height: 190%;
		}

		ul.special-icons .fa {
			float: left;
			display: inline-block;
			padding-right: 1em;
			font-size: 1.4em;
			color: #82b440;
		}

		ul.special-icons p {
			padding-left: 2.7em;
		}

/* Tables */

	table {
		width: 100%;
	}

		table.default {
			width: 100%;
		}

			table.default tbody tr {
				border-bottom: solid 1px #82b440;
			}

			table.default td {
				padding: 0.5em 1em 0.5em 1em;
			}

			table.default th {
				font-weight: 700;
				padding: 0.5em 1em 0.5em 1em;
				text-align: left;
			}

			table.default thead {
				background: #555555;
				color: #fff;
			}

/* Button */

	input[type='submit'],
	input[type='reset'],
	input[type='button'],
	.button {
		-moz-appearance: none;
		-webkit-appearance: none;
		-o-appearance: none;
		-ms-appearance: none;
		appearance: none;
		background: none;
		border-radius: none;
		border: 2px solid;
		border-color: #82b440;
		color: #82b440;
		cursor: pointer;
		display: inline-block;
		padding: 0.40em 1.0em;
		letter-spacing: 1px;
		text-align: center;
		text-decoration: none;
		text-transform: uppercase;
		font-size: 1.4em;
		-moz-transition: all 0.35s ease-in-out;
		-webkit-transition: all 0.35s ease-in-out;
		-o-transition: all 0.35s ease-in-out;
		-ms-transition: all 0.35s ease-in-out;
		transition: all 0.35s ease-in-out;
	}

		input[type='submit']:hover,
		input[type='reset']:hover,
		input[type='button']:hover,
		.button:hover {
			background: #82b440;
			color: white;
		}

		input[type='submit'].alt,
		input[type='reset'].alt,
		input[type='button'].alt,
		.button.alt {
			border-color: inherit;
			color: inherit;
		}

			input[type='submit'].alt:hover,
			input[type='reset'].alt:hover,
			input[type='button'].alt:hover,
			.button.alt:hover {
				background: white;
				color: #82b440;
			}

		input[type='submit'].fit,
		input[type='reset'].fit,
		input[type='button'].fit,
		.button.fit {
			width: 100%;
		}

		input[type='submit'].small,
		input[type='reset'].small,
		input[type='button'].small,
		.button.small {
			font-size: 0.8em;
		}

/* Wrapper */

	.wrapper {
		padding: 6em 0em 4em 0em;
	}

		.wrapper.style1 {
			padding: 0em;
			background: #222222 url(../images/banner.jpg) no-repeat;
			background-size: cover;
		}

		.wrapper.style2 {
			background: #f2f2f2;
		}

			.wrapper.style2 .major {
				text-align: left !important;
			}

				.wrapper.style2 .major h2 {
					display: block;
					margin-bottom: 0.70em;
					letter-spacing: 1px;
					line-height: 1.4em;
					text-transform: uppercase;
					font-size: 1.8em;
					font-weight: 400;
				}

				.wrapper.style2 .major .byline {
					letter-spacing: normal;
					line-height: 1.6em;
					text-transform: capitalize;
					font-size: 1.4em;
				}

			.wrapper.style2 h3 {
				display: block;
				margin-bottom: 1em;
				letter-spacing: 1px;
				line-height: 1.4em;
				text-transform: uppercase;
				font-size: 1.6em;
				font-weight: 400;
			}

		.wrapper.style3 {
			padding-bottom: 6em;
			background: #82b440;
			text-align: center;
			color: white;
		}

			.wrapper.style3 .container {
				padding-left: 6em;
				padding-right: 6em;
			}

			.wrapper.style3 p {
				font-size: 1.6em;
			}

		.wrapper.style4 {
			background: white;
		}

		.wrapper.style5 {
			background: #82b440;
			text-align: center;
			color: white;
		}

			.wrapper.style5 .image {
				display: block;
				width: 60%;
				margin: 0em auto 2em auto;
			}

				.wrapper.style5 .image img {
					border-radius: 50%;
					border: 10px solid;
					border-color: white;
				}

/* Header */

	#header {
		color: white;
		height: 4em;
		background: rgba(0, 0, 0, 0.5);
	}

		#header .container {
			position: relative;
		}

	.homepage #logo {
		display: none;
	}

	.homepage #nav {
		position: static;
		right: none;
		text-align: center;
	}

	#logo {
		line-height: 2em;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-size: 2em;
		font-weight: 400;
	}

		#logo h1 {
			display: inline-block;
			margin: 0;
			padding: 0;
		}

		#logo a {
			color: inherit;
		}

	#nav {
		position: absolute;
		top: 0;
		right: 0;
	}

		#nav > ul {
			margin: 0;
		}

			#nav > ul > li {
				border-radius: 4px;
				display: inline-block;
				margin-left: 0.5em;
				padding: 0 0.5em;
			}

				#nav > ul > li a {
					color: inherit;
					line-height: 4em;
					letter-spacing: 2px;
					text-decoration: none;
					text-transform: uppercase;
					font-weight: 400;
					font-size: 1em;
				}

				#nav > ul > li:first-child {
					margin-left: 0;
				}

				#nav > ul > li.active a {
					color: white;
				}

				#nav > ul > li > ul {
					display: none;
				}

/* Dropotron */

	.dropotron {
		top: 2em;
		background: rgba(32, 32, 32, 0.75);
		border-radius: 4px;
		color: inherit;
		min-width: 12em;
		padding: 1em 0;
		color: white;
	}

		.dropotron > li {
			line-height: 2em;
			padding: 0 1em;
		}

			.dropotron > li > a {
				color: inherit;
				letter-spacing: 2px;
				text-decoration: none;
				text-transform: uppercase;
			}

			.dropotron > li.active > a, .dropotron > li:hover > a {
				color: inherit;
			}

		.dropotron.level-0 {
			border-radius: 0 0 4px 4px;
			font-size: 1em;
			margin-left: -0.5em;
		}

/* Banner */

	#banner {
		padding: 6em 0em 3em 0em;
		text-align: center;
		text-transform: uppercase;
		color: white;
	}

		#banner .container {
			padding: 0em 8em;
		}

		#banner h2 {
			display: inline-block;
			padding: 0.50em 0.30em;
			background: #82b440;
			font-size: 3em;
			font-weight: 400;
		}

		#banner span, #banner p {
			display: block;
			letter-spacing: 1px;
			text-transform: uppercase;
			font-size: 1.6em;
			font-weight: 300;
		}

		#banner span {
			padding: 1em 0em;
		}

/* Main */

	#main {
		padding: 4em 0;
	}

		#main #content .major, #main #sidebar .major {
			text-align: left;
		}

		#main #sidebar section {
			margin-top: 4em;
		}

			#main #sidebar section:first-child {
				margin-top: 0;
			}

		#main #sidebar .major {
			padding-bottom: 2em;
		}

			#main #sidebar .major h2 {
				font-size: 1.8em;
			}

/* Footer */

	#footer {
		padding: 6em 0 2em 0;
		text-align: center;
		color: white;
	}

		#footer hr {
			border-bottom: 1px solid;
			border-color: inherit;
			opacity: .05;
		}

		#footer .major h2 {
			color: inherit;
		}

		#footer .major .byline {
			color: inherit;
			opacity: .4;
		}

		#footer .copyright {
			margin-top: 3em;
			text-align: center;
		}

/* Copyright */

	#copyright {
		position: relative;
		text-transform: uppercase;
		text-align: center;
		padding: 3em 0em 3em 0em;
		color: inherit;
		opacity: .40;
	}

		#copyright a {
			text-decoration: none;
			color: inherit;
		}

/* Extra */

	#extra1 h2 {
		display: block;
		margin-bottom: 1em;
		letter-spacing: 1px;
		line-height: 1.4em;
		text-transform: uppercase;
		font-size: 1.8em;
		font-weight: 400;
	}

	#extra1 h3 {
		display: block;
		margin-bottom: 1em;
		letter-spacing: 1px;
		line-height: 1.4em;
		text-transform: uppercase;
		font-size: 1.6em;
		font-weight: 400;
	}

/* Team */

	#team h3 {
		margin-bottom: 0.50em;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-weight: 700;
	}

</style>
		
<head>
<meta charset='ISO-8859-1'>
<title>page d'accueil Mesguen</title>
</head>
<body>

<p align='left'>
<img alt='mesguen' src='LOGO_MESGUEN_TRANSPORT.jpg' border='1' width='300'/>
</p>";
$date = date("d-m-Y");
$heure = date("H:i");
Print("Nous sommes le $date et il est $heure");
echo "<form action='mesguen'> 
arriv�e a l'etape : inserer_etape <br/> Palette(s):
<label>livr�es :</label>
		
<input name='livr�es' id='livr�es' type='text'/>
<label>dont EUR :</label>
<input name='Eurliv' id='Eurliv' type='text'/><br/><br/>
<label>Charg�es :</label>
<input name='charg�es' id='charg�es' type='text'/>
<label>dont EUR :</label>
<input name='Eurcha' id='Eurcha' type='text'/><br/><br/>

<input name='photo' id='photo' type='button' value='prendre une photo'/><br/>
<input name='retour' id='retour' type='button' value='retour'/>
<input name='valider' id='valider' type='button' value='valider'/>

</form>
</body>
</html>";


?>