<?php
//create a unique id so we cachebust
$id = uniqid(rand(),true);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Media Query Test: Hide an image tag</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="_css/style.css" />
	
	<!-- Test 1 Styles -->
	<style type="text/css">
	@media all and (max-width: 600px) {
	    #test1 {
	        display:none;
	    }
	    
	}
	</style>
	
	
	<script type="text/javascript">
	var startTime = (new Date().getTime());
	</script>
</head>
<body>
<h1>Media Query Image Download Test</h1>

<p>Lovingly pulled from Cloud Four. <a href="http://www.cloudfour.com/css-media-query-for-mobile-is-fools-gold/">Cloud Four article on media queries</a></p>

<h2 id="t1">Test One: Image Tag</h2>
<p>
    Simple image tag that will show up when page is greater than 600 pixels wide, but are hidden on smaller screens.
</p>

<div id="test1">
    <img src="images/test1.png?<?php echo $id; ?>"/>
</div>

<h4>HTML Code</h4>
<code>&#60;div id="test1"&#62;
    &#60;img src="images/test1.png?<?php echo $id; ?>>" /&#62;
&#60;/div&#62;
</code>

<h4>CSS Code</h4>
<code>&#60;style type="text/css"&#62;

@media all and (max-width: 600px) {
    #test1 {
        display:none;
    }
}
&#60;/style&#62;
</code>

<div id="loaded">
	<h2>Results</h2>
</div>

<?php include('includes/testLinks.inc.php'); ?>
<script type="text/javascript" src="_js/imageTest.js"></script>
<script type="text/javascript" charset="utf-8">
var _bTestResults = {};
window.onload = function() {

	//set the domain prefix so we can just pass image names
	prefix = 'images/';

	//set our suffix
    //needed because setting image.src fires request
    //this helps us avoid caching messing with the results
	suffix = '<?php echo $id; ?>';
	
	//get the div where we'll spit out the results
	target = document.getElementById('loaded');

	var images = [
		['test1.png', 'Loaded']
	];
	
	_bTestResults = imageTest(images);

	// Fetch the Browserscope script that sucks the results from _bTestResults
	(function() {
		var _bTestKey = 'agt1YS1wcm9maWxlcnINCxIEVGVzdBjJ1OINDA';
		var _bScript = document.createElement('script');
		_bScript.src = 'http://www.browserscope.org/user/beacon/' + _bTestKey;
		_bScript.src += '?sandboxid=514f44cc994903e';
		_bScript.setAttribute('async', 'true');
		var scripts = document.getElementsByTagName('script');
		var lastScript = scripts[scripts.length - 1];
		lastScript.parentNode.insertBefore(_bScript, lastScript);
	})();
}
</script>
</body>
</html>
