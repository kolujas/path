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


#fish-cont {
    left: 1.8%;
    top: 13.8%;
}
#pet-cont{
    top: 50.6%;
    left: 82%;
}
#bird-cont{
    top: 35.2%;
    left: 1.4%;
}
#tiger-cont{
    top: 18.6%;
    left: 82.5%;
}
#monkey-cont{
    top: 59.3%;
    left: 4.4%;
}
}
#fish-cont input[data-hint="r"]::after{
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
    margin: 0 1px;
    background: #fafafa;
    border: none;
    border-bottom: 2px solid #ddd;
	transition: .2s;
	text-align:center;
	font-family: 'Montserrat';
	font-size: 14px;
	/* transform: translateY(%); */

}
.animal-cont>div>input:focus{
	outline: none;
	border-bottom: 2px #376291 solid;
}
.animal-cont>div>p{
	font-family: 'Montserrat';
	letter-spacing: 2px;
	font-size: 14px;
	transform: translateY(33%);
}

</style>
</head>
<body>

<div id="relative-cont">


<!-- Generator: Adobe Illustrator 23.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1366 768" style="enable-background:new 0 0 1366 768;" xml:space="preserve">
<style type="text/css">
	.st0{display:none;}
	.st1{fill:none;stroke:#014969;stroke-width:3;stroke-miterlimit:10;}
	.st2{fill:#014969;}
	.st3{fill:none;}
	.st4{font-family:'Montserrat'; text-align:center;}
	.st5{font-size:39px;}

</style>



<g id="Layer_1">
	
		<image style="overflow:visible;" width="1363" height="704" xlink:href="{{asset('img/C02408EA.jpg')}}"  transform="matrix(0.9999 0 0 0.9999 3 33)">
	</image>
</g>
<g id="Layer_3">
	<g>
		<g>
			<line class="st1" x1="423.6" y1="521.4" x2="305" y2="499"/>
			<g>
				<polygon class="st2" points="418.7,515.3 422.8,521.2 416.8,525.3 421.1,526.1 427,522 422.9,516.1 				"/>
			</g>
		</g>
	</g>
	<path class="st1" d="M284.4,547.5H27.6c-10.6,0-19.1-8.6-19.1-19.1v-57.8c0-10.6,8.6-19.1,19.1-19.1h256.8
		c10.6,0,19.1,8.6,19.1,19.1v57.8C303.5,538.9,294.9,547.5,284.4,547.5z"/>
	<rect x="36" y="489.7" class="st3" width="241.2" height="54.4"/>
	<!-- <text transform="matrix(1 0 0 1 83.9321 517.3955)" class="st4 st5">MONKEY</text> -->
	<g>
		<g>
			<line class="st1" x1="555.1" y1="360" x2="221" y2="311"/>
			<g>
				<polygon class="st2" points="549.9,354.1 554.2,359.9 548.5,364.2 552.7,364.8 558.5,360.5 554.2,354.7 				"/>
			</g>
		</g>
	</g>
	<path class="st1" d="M202.4,359.5H30.6c-10.6,0-19.1-8.6-19.1-19.1v-57.8c0-10.6,8.6-19.1,19.1-19.1h171.8
		c10.6,0,19.1,8.6,19.1,19.1v57.8C221.5,350.9,212.9,359.5,202.4,359.5z"/>
	<rect x="-5" y="300.7" class="st3" width="241.2" height="54.4"/>
	<!-- <text transform="matrix(1 0 0 1 76.8813 328.3955)" class="st4 st5">BIRD</text> -->
	<g>
		<g>
			<line class="st1" x1="391.1" y1="157.2" x2="223" y2="143"/>
			<g>
				<polygon class="st2" points="385.6,151.6 390.2,157.1 384.7,161.8 389,162.1 394.5,157.5 389.9,152 				"/>
			</g>
		</g>
	</g>
	<path class="st1" d="M203.4,191.5H33.6c-10.6,0-19.1-8.6-19.1-19.1v-57.8c0-10.6,8.6-19.1,19.1-19.1h169.8
		c10.6,0,19.1,8.6,19.1,19.1v57.8C222.5,182.9,213.9,191.5,203.4,191.5z"/>
	<rect x="-5" y="132.7" class="st3" width="241.2" height="54.4"/>
	<!-- <text transform="matrix(1 0 0 1 79.104 160.3955)" class="st4 st5">FISH</text> -->
	<g>
		<g>
			<line class="st1" x1="980.4" y1="159.6" x2="1099" y2="182"/>
			<g>
				<polygon class="st2" points="985.3,165.7 981.2,159.8 987.2,155.7 982.9,154.9 977,159 981.1,164.9 				"/>
			</g>
		</g>
	</g>
	<path class="st1" d="M1325.4,229.5h-203.8c-10.6,0-19.1-8.6-19.1-19.1v-57.8c0-10.6,8.6-19.1,19.1-19.1h203.8
		c10.6,0,19.1,8.6,19.1,19.1v57.8C1344.5,220.9,1335.9,229.5,1325.4,229.5z"/>
	<rect x="1101" y="171.7" class="st3" width="241.2" height="54.4"/>
	<!-- <text transform="matrix(1 0 0 1 1174.5547 199.3955)" class="st4 st5">TIGER</text> -->
	<g>
		<g>
			<line class="st1" x1="897.4" y1="555.6" x2="1094.3" y2="425.5"/>
			<g>
				<polygon class="st2" points="905.2,556.6 898.1,555.1 899.5,548.1 895.9,550.5 894.5,557.5 901.5,558.9 				"/>
			</g>
		</g>
	</g>
	<path class="st1" d="M1314.4,479.5h-198.8c-10.6,0-19.1-8.6-19.1-19.1v-57.8c0-10.6,8.6-19.1,19.1-19.1h198.8
		c10.6,0,19.1,8.6,19.1,19.1v57.8C1333.5,470.9,1324.9,479.5,1314.4,479.5z"/>
	<rect x="1093" y="420.7" class="st3" width="241.2" height="54.4"/>
	<!-- <text transform="matrix(1 0 0 1 1183.9292 448.3955)" class="st4 st5">PET</text> -->
</g>
</svg>


<div id="fish-cont" class="animal-cont">
	<div>
		<p>fis</p>
		<input maxlength="1" value="h" disabled type="text">
	</div>
</div>

<div id="monkey-cont" class="animal-cont">
	<div>
        <p>m</p>
		<input maxlength="1" type="text">
		<p>n</p>
		<p>k</p>
		<input maxlength="1" type="text">
		<p>y</p>
	</div>
</div>

<div id="tiger-cont" class="animal-cont">
	<div>
        <p>t</p>
		<input maxlength="1" type="text">
		<p>g</p>
		<input maxlength="1" type="text">
		<p>r</p>
	</div>
</div>

<div id="bird-cont" class="animal-cont">
	<div>
        <p>b</p>
		<input maxlength="1" type="text">
		<input maxlength="1" type="text">
        <p>d</p>
	</div>
</div>

<div id="pet-cont" class="animal-cont">
	<div>
		<p>p</p>
		<input maxlength="1" type="text">
		<p>t</p>
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