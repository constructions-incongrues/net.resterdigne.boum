<?php
require_once(__DIR__.'/../vendor/autoload.php');

use Symfony\Component\Finder\Finder;

// Actors
$finderActors = new Finder();
$finderActors
    ->files()
    // ->in(__DIR__.'/assets/images/oppressed')
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

<html>
    <head>
        <title>Ma main invisible, tu la veux sur la gueule ? | v0.3.1</title>
        <style>
body {
    background-color: #000;
    overflow: hidden;
    text-align: center;
}

#image {
    height: 100%;
}

#overlay {
    display:none;
    color: #fff;
    font-size: 250px;
    text-shadow: 2px 2px 2px #000;
    text-align: center;
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}
        </style>
    </head>

    <body>

        <img id="image" src="assets/images/<?php echo rawurldecode(implode('/', $partsImageActors)) ?>">

        <p id="overlay">
<?php echo $insult; ?>
        </p>

        <script>
            var isPaused = false;
            window.setInterval(() => {
                if (!isPaused) {
                    window.location.reload();
                }
            }, 1000);

            ['click','ontouchstart'].forEach(function(event) {
                document.getElementById('image').addEventListener(event, function(e) {
                    if (e.target.src.match(/oppressed/)) {
                        console.log('ASSASSIN !');
                    } else {
                        isPaused = true;
                        document.getElementById('overlay').style.display = 'block';
                        window.setTimeout(() => {
                            e.target.src = 'assets/images/<?php echo rawurldecode(implode('/', array_slice(explode('/', array_rand(iterator_to_array($finderRetributions))), -3, 3))) ?>';
                            window.setTimeout(() => {
                                isPaused = false;
                            }, 2000);
                        }, 1000);
                        console.log('BRAVO !');
                    }
                });
            });
        </script>
    </body>
</html>
