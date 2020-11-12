<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="UTF-8">
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>

#relative-cont{
    position: relative;
    width: 100%;
}
span, select{
    font-family: 'Montserrat';

}
#primer{
    position: absolute;
    top: 14%;
    left: 13%;

    width: 45%;
}
#segundo{
    position: absolute;
    top: 40%;
    left: 25%;
    width: 41%;
}
#tercero{
    position: absolute;
    top: 73%;
    left: 49%;
    width: 45%;
}
select[disabled]{
    color: #376291;
    font-weight: 600;
}
</style>
</head>
<body>

<div id="relative-cont">


<!-- Generator: Adobe Illustrator 23.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1366 768" style="enable-background:new 0 0 1366 768;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#FFFFFF;stroke:#014969;stroke-width:2;stroke-miterlimit:10;}
	.st1{fill:#FFFFFF;stroke:#FBFF1F;stroke-width:2;stroke-miterlimit:10;}
	.st2{fill:none;stroke:#014969;stroke-width:2;stroke-miterlimit:10;}
	.st3{fill:none;stroke:#FBFF1F;stroke-width:2;stroke-miterlimit:10;}
</style>
<image style="overflow:visible;" width="1366" height="665" xlink:href="{{asset('img/personajes.jpg')}}"  transform="matrix(1 0 0 1 -2.16 64.44)">
</image>
<path class="st0" d="M841.6,205.6c0,6.6-5.4,12-12,12h-691c-6.6,0-12-5.4-12-12V74c0-6.6,5.4-12,12-12h691c6.6,0,12,5.4,12,12"/>
<path class="st0" d="M841.6,153.8v52.5"/>
<path class="st0" d="M613.9,652v-59.9"/>
<path class="st0" d="M613.9,522.1c0-6.6,5.4-12,12-12h691c6.6,0,12,5.4,12,12v131.5c0,6.6-5.4,12-12,12h-691c-6.6,0-12-5.4-12-12
	V652"/>
<path class="st1" d="M313.6,421.3v-51.5"/>
<path class="st1" d="M313.6,289.8c0-6.6,5.2-12,11.5-12h589.6c6.3,0,11.5,5.4,11.5,12v131.5c0,6.6-5.2,12-11.5,12H325.1
	c-6.3,0-11.5-5.4-11.5-12"/>
<path class="st0" d="M841.8,73.8v44.6"/>
<line class="st2" x1="841.8" y1="118.5" x2="956" y2="151.6"/>
<line class="st2" x1="841.6" y1="153.8" x2="956" y2="151.6"/>
<path class="st0" d="M613.9,558v-35.9"/>
<path class="st0" d="M613.8,652.2v-59.9"/>
<line class="st2" x1="613.9" y1="558" x2="505.1" y2="508"/>
<line class="st2" x1="613.9" y1="592.1" x2="505.1" y2="508"/>
<path class="st1" d="M313.6,327.5V289"/>
<path class="st1" d="M313.6,422.1v-52.8"/>
<line class="st3" x1="313.6" y1="326.1" x2="251.2" y2="345.8"/>
<line class="st3" x1="313.6" y1="369.3" x2="251.2" y2="345.8"/>
</svg>



<div id="primer">
    <div>
        <span>I am wearing a </span>
        <select name="A1_Access:W1[1]">
            <option disabled selected value=""></option>
            <option disabled>Green</option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option disabled>T-shirt</option>
            <option value="Shorts">Shorts</option>
            <option value="Cap">Cap</option>
        </select>
        <select disabled>
            <option disabled selected>T-shirt</option>
        </select>
        <span>.</span>
    </div>
</div>
<div id="segundo">
    <div>
        <span>I am wearing a yellow</span>
        <select name="A1_Access:W1[2]">
            <option disabled selected value=""></option>
            <option disabled>Green</option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option disabled>T-shirt</option>
            <option value="Shorts">Shorts</option>
            <option value="Cap">Cap</option>
        </select>
        <span>and</span>
        <select name="A1_Access:W1[3]">
            <option disabled selected value=""></option>
            <option disabled>Green</option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option disabled>T-shirt</option>
            <option value="Shorts">Shorts</option>
            <option value="Cap">Cap</option>
        </select>
        <span>trousers.</span>
    </div>
</div>
<div id="tercero">
    <div>
        <span>I am wearing</span>
        <select disabled>
            <option disabled selected>Green</option>
        </select>
        <select name="A1_Access:W1[7]">
            <option disabled selected value=""></option>
            <option disabled>Green</option>
            <option value="Red">Red</option>
            <option value="Orange">Orange</option>
            <option disabled>T-shirt</option>
            <option value="Shorts">Shorts</option>
            <option value="Cap">Cap</option>
        </select>

    </div>
</div>
</div>
</body>
<script>
$(document).ready(function(){



});
</script>
</html>