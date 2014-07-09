<html>

<head>

    <?php include "header.php"?>
<title>Learning WebGL</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

<script type="text/javascript" src="/glmatrix/glMatrix.min.js"></script>

<script type="text/javascript" src="../three.js/build/three.min.js"></script>
<script type="text/javascript" src="../RequestAnimationFrame.js/RequestAnimationFrame.js"></script>
<script>

var renderer = null,
	scene = null,
	camera = null,
	cube = null,
	animating = false;

function onload()
{
	var container = document.getElementById("container");

	renderer = new THREE.WebGLRenderer({antialias: true});
	renderer.setSize(container.offsetWidth, container.offsetHeight);
	container.appendChild(renderer.domElement);

	scene = new THREE.Scene();

	camera = new THREE.PerspectiveCamera(45, container.offsetWidth/container.offsetHeight, 1, 4000);
	camera.position.set(0,0,3);

	var light = new THREE.DirectionalLight(0xffffff, 1.5);
	light.position.set(0,0,1);
	scene.add(light);

	var mapUrl = "../image/test.jpg";
	var map = THREE.ImageUtils.loadTexture(mapUrl);

	var material = new THREE.MeshPhongMaterial({map: map});

	var geometry = new THREE.CubeGeometry(1,1,1);

	cube = new THREE.Mesh(geometry, mateiral);

	cube.rotation.x = Math.PI / 5;
	cube.ratation.y = Math.PI / 5;

	scene.add(cube);

	addMouseHandler();

	run();
}

function run()
{
	renderer.render(scene,camera);
	if(animating){
		cube.rotation.y -= 0.01;
	}

	requestAnimationFrame(run);
}

function addMouseHandler()
{
	var dom = renderer.domElement;
	dom.addEventlistener('mouseup', onMouseUp, false);
}

function onMouseUp(event){
	event.preventDefault();
	animating = !animating;
}

</script>

</head>

<body onload="onload();">
	<?php include "navigation.php"?>
	<div id="container" style="width:95%; height:80%; position:absolute;">
	</div>
	<div id="prompt" style="width:95%; height:6%; bottom:0; position:absolute;">
		Click to animate the cube
	</div>


</body>
</html>