<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="UTF-8">
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>

#relative-cont{
	position: relative;
}
#horse-cont {
    left: 1.2%;
    top: 8%;
}
#cow-cont{
	top: 74.5%;
    left: 85.6%;
}
#sheep-cont{
	top: 41.8%;
    left: 82.2%;
}
#pig-cont{
	top: 3.8%;
    left: 84.1%;
}
#chicken-cont{
	top: 63.8%;
    left: 4.6%;
}
#horse-cont input[data-hint="r"]::after{
	content: attr(data-hint);
}

.animal-cont{
	position: absolute;
    width: 14%;
    height: 10.5%;
    overflow: hidden;
    border-radius: 10px;
}
.animal-cont>div{
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    height: 100%;
}
.animal-cont>div>input[disabled]{
	color: #376291;
}
.animal-cont>div>input{
	width: 14px;
	margin: 4px 1px 0 1px;
    height: 14px;
    background: #fafafa;
    border: none;
    border-bottom: 2px solid #ddd;
	transition: .2s;
	text-align:center;
	font-family: 'Montserrat';
	font-size: 12px;
	/* transform: translateY(%); */

}
.animal-cont>div>input:focus{
	outline: none;
	border-bottom: 2px #376291 solid;
}
.animal-cont>div>p{
	font-family: 'Montserrat';
	margin-top: 10px;
	letter-spacing: 2px;
	font-size: 11px;
	transform: translateY(30%);
}

</style>
</head>
<body>

<div id="relative-cont">


<!-- Generator: Adobe Illustrator 23.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 513 256" style="enable-background:new 0 0 513 256;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#FFFFFF;stroke:#376291;stroke-miterlimit:10;}
	.st1{fill:none;stroke:#376291;stroke-miterlimit:10;}
	.st2{fill:#376291;}
	.st3{fill:none;}
	<!-- .st4{font-family:'Montserrat';} -->
	.st5{font-size:12px;}
</style>
<image style="overflow:visible;" width="513" height="256" xlink:href="{{ asset('img/52194D69.jpg') }}"  transform="matrix(0.9999 0 0 0.9999 0 0)">
</image>
<path class="st0" d="M72.3,46.9H12.1c-3,0-5.5-2.5-5.5-5.5V27c0-3,2.5-5.5,5.5-5.5h60.2c3,0,5.5,2.5,5.5,5.5v14.4
	C77.8,44.4,75.3,46.9,72.3,46.9z"/>
<g>
	<g>
		<line class="st1" x1="113.3" y1="50.3" x2="78.1" y2="33.4"/>
		<g>
			<polygon class="st2" points="112.2,47.9 113,50.1 110.7,50.9 112,51.6 114.3,50.8 113.5,48.5 			"/>
		</g>
	</g>
</g>
<rect x="10.4" y="29" class="st3" width="63.8" height="12.5"/>
<!-- <text transform="matrix(1 0 0 1 28.3921 37.52)" class="st4 st5" id="horse-text">horse</text> -->
<path class="st0" d="M89.9,190.9H29.7c-3,0-5.5-2.5-5.5-5.5V171c0-3,2.5-5.5,5.5-5.5h60.2c3,0,5.5,2.5,5.5,5.5v14.4
	C95.4,188.4,92.9,190.9,89.9,190.9z"/>
<g>
	<g>
		<line class="st1" x1="130.9" y1="194.2" x2="95.7" y2="177.4"/>
		<g>
			<polygon class="st2" points="129.8,191.8 130.6,194.1 128.3,194.9 129.6,195.5 131.9,194.7 131.1,192.5 			"/>
		</g>
	</g>
</g>
<rect x="28" y="173" class="st3" width="63.8" height="12.5"/>
<!-- <text transform="matrix(1 0 0 1 40.7001 181.48)" class="st4 st5">chicken</text> -->
<path class="st0" d="M505.3,218.6h-60.2c-3,0-5.5-2.5-5.5-5.5v-14.4c0-3,2.5-5.5,5.5-5.5h60.2c3,0,5.5,2.5,5.5,5.5v14.4
	C510.9,216.1,508.4,218.6,505.3,218.6z"/>
<g>
	<g>
		<line class="st1" x1="402.8" y1="215.3" x2="439.6" y2="207.4"/>
		<g>
			<polygon class="st2" points="405.1,216.6 403,215.3 404.3,213.2 402.9,213.5 401.6,215.6 403.7,216.9 			"/>
		</g>
	</g>
</g>
<rect x="443.5" y="200.7" class="st3" width="63.8" height="12.5"/>
<!-- <text transform="matrix(1 0 0 1 465.0019 209.24)" class="st4 st5">cow</text> -->
<path class="st0" d="M487.6,134.2h-60.2c-3,0-5.5-2.5-5.5-5.5v-14.4c0-3,2.5-5.5,5.5-5.5h60.2c3,0,5.5,2.5,5.5,5.5v14.4
	C493.1,131.7,490.6,134.2,487.6,134.2z"/>
<g>
	<g>
		<line class="st1" x1="301.5" y1="134.8" x2="421.3" y2="121"/>
		<g>
			<polygon class="st2" points="303.7,136.2 301.8,134.8 303.3,132.9 301.9,133 300.4,134.9 302.2,136.4 			"/>
		</g>
	</g>
</g>
<rect x="425.7" y="116.3" class="st3" width="63.8" height="12.5"/>
<!-- <text transform="matrix(1 0 0 1 442.508 124.84)" class="st4 st5">sheep</text> -->
<path class="st0" d="M497.2,35.8H437c-3,0-5.5-2.5-5.5-5.5V15.9c0-3,2.5-5.5,5.5-5.5h60.2c3,0,5.5,2.5,5.5,5.5v14.4
	C502.7,33.3,500.2,35.8,497.2,35.8z"/>
<g>
	<g>
		<line class="st1" x1="395.8" y1="47.8" x2="431.4" y2="21.6"/>
		<g>
			<polygon class="st2" points="398.4,48 396.1,47.7 396.4,45.3 395.3,46.1 394.9,48.5 397.3,48.9 			"/>
		</g>
	</g>
</g>
<rect x="435.3" y="17.9" class="st3" width="63.8" height="12.5"/>
<!-- <text transform="matrix(1 0 0 1 459.068 26.44)" class="st4 st5">pig</text> -->
</svg>


<div id="horse-cont" class="animal-cont">
	<div>
		<p>hors</p>
		<input maxlength="1" value="e" disabled type="text">
	</div>
</div>

<div id="chicken-cont" class="animal-cont">
	<div>
		<p>c</p>
		<input name="DEMO:RW3[1]" maxlength="1" type="text">
		<p>i</p>
		<p>c</p>
		<input name="DEMO:RW3[1c]" maxlength="1" type="text">
		<p>e</p>
		<p>n</p>

	</div>
</div>

<div id="pig-cont" class="animal-cont">
	<div>
		<p>p</p>
		<input name="DEMO:RW3[3]" maxlength="1" type="text">
		<p>g</p>

	</div>
</div>

<div id="sheep-cont" class="animal-cont">
	<div>
		<input name="DEMO:RW3[4a]" maxlength="1" type="text">
		<input name="DEMO:RW3[4b]" maxlength="1" type="text">
		<p>e</p>
		<input name="DEMO:RW3[4c]" maxlength="1" type="text">
		<p>p</p>
	</div>
</div>

<div id="cow-cont" class="animal-cont">
	<div>
		<p>c</p>
		<input name="DEMO:RW3[5a]" maxlength="1" type="text">
		<input name="DEMO:RW3[5b]" maxlength="1" type="text">
	</div>
</div>


</div>

</body>
<script>
$(document).ready(function(){

$('.animal-cont input').keyup(function () {
	$(this).blur()
	$(this).next('input').focus();
})



});
</script>
</html>