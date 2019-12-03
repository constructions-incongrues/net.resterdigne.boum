<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

require __DIR__.'/../vendor/autoload.php';

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle()
        ];
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        // PHP equivalent of config/packages/framework.yaml
        $c->loadFromExtension('framework', [
            'secret' => 'S0ME_SECRET'
        ]);
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // kernel is a service that points to this class
        // optional 3rd argument is the route name
        $routes->add('/collections', 'kernel::collections');
        $routes->add('/collection/{collection}', 'kernel::collection');
    }

    public function collections(Request $request)
    {
        $finder = new Finder;
        $collections = array_keys(
            iterator_to_array(
                $finder
                    ->directories()
                    ->depth('== 0')
                    ->in(__DIR__.'/images')
            )
        );
        array_walk($collections, function(&$value) use ($request) {
            $value = sprintf('%s/collection/%s', $request->getUriForPath(''), basename($value));
        });
        return new JsonResponse($collections);
    }

    public function collection($collection, Request $request)
    {
        $finder = new Finder;
        $images = array_keys(
            iterator_to_array(
                $finder
                    ->files()
                    ->in(__DIR__.'/images/'.$collection)
            )
        );
        array_walk($images, function(&$value) use ($request, $collection) {
            $value = sprintf('%s/images/%s/%s/%s', $request->getUriForPath(''), $collection, rawurlencode(basename(dirname($value))), rawurlencode(basename($value)));
        });
        shuffle($images);
        $images = array_slice($images, 0, $request->query->get('limit', 10));
        return new JsonResponse($images);
    }
}

$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
