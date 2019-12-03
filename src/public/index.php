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

// Insult
$insults = file(__DIR__.'/../var/insults.txt');
$insult = $insults[array_rand($insults)];
?>

<title>Ma main invisible, tu la veux sur la gueule ? | v0.3.0</title>

<body style="background-color:#000;overflow:hidden;">

<div style="text-align:center;">
    <img id="image" src="assets/images/<?php echo rawurldecode(implode('/', $partsImageActors)) ?>" style="height:100%;">
</div>

<p id="overlay" style="display:none; color: #fff; font-size: 250px; text-shadow: 2px 2px 2px #000; text-align: center; position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%); width: 100%;">
<?php echo $insult; ?>
</p>

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
                document.getElementById('overlay').style.display = 'block';
            }
        });
    });
</script>
</body>
