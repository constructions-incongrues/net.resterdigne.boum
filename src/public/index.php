<?php
require_once(__DIR__.'/../vendor/autoload.php');

use Symfony\Component\Finder\Finder;

// Actors
$finderActors = new Finder();
$finderActors
    ->files()
    ->in(__DIR__.'/assets/images/oppressed')
    ->in(__DIR__.'/assets/images/oppressors');
$partsImageActors = array_slice(explode('/', array_rand(iterator_to_array($finderActors))), -3, 3);

// Retribution
$finderRetributions = new Finder();
$finderRetributions->files()->in(__DIR__.'/assets/images/retribution');
$partsImageRetributions = array_slice(explode('/', array_rand(iterator_to_array($finderRetributions))), -3, 3);
?>

<title>Ma main invisible, tu la veux sur la gueule ? | v0.2.0</title>

<body style="background-color:#000;overflow:hidden;">
<div style="text-align:center;">
    <img id="image" src="assets/images/<?php echo rawurldecode(implode('/', $partsImageActors)) ?>" style="height:100%;">
</div>

<script>
    var isPaused = false;
    window.setInterval(() => {
        if (!isPaused) {
            window.location.reload();
        }
    }, 3000);

    ['click','ontouchstart'].forEach(function(event) {
        document.getElementById('image').addEventListener(event, function(e) {
            if (e.target.src.match(/oppressed/)) {
                console.log('ASSASSIN !');
            } else {
                console.log('BRAVO !');
                e.target.src = 'assets/images/<?php echo rawurldecode(implode('/', array_slice(explode('/', array_rand(iterator_to_array($finderRetributions))), -3, 3))) ?>';
            }
        });
    });
</script>
</body>
