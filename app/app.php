<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();
// Server login
    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
// Allows use of _method input
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
//-- Routes --
//creates a route to homepage and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->get('/', function() use($app){
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//creates a route to stylists upon adding a stylist and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->post("/stylists", function() use ($app) {
        $stylist = new Stylist($_POST['name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//creates a route to delete_stylists upon clicking deleteall and renders index, does not require all stylists because there are none
    $app->post("/delete_stylists", function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig');
    });
//creates a route to a stylist's page upon clicking the stylist's name on the homepage, the stylist referenced in the url and all of their clients are associated with indices so that twig may use them
    $app->get("/stylist/{id}", function($id) use ($app){
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
//create a route to clients upon creating a new client, the client's data is saved to the database and the stylist page is rendered using twig using the stylist associated with the client and all of the clients associated with the stylist
    $app->post("/clients", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        $variable = $stylist->find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
//creates a route to delete_clients upon clicking deleteall and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->post("/delete_clients", function() use ($app) {
        Client::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//creates a route the stylist's edit page and rendering stylist_edit storing "stylist" as an index to the stylist being edited
    $app->get("/stylist/{id}/edit", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist_edit.html.twig', array('stylist' => $stylist));
    });
//creates a route to the stylist's page upon updating the stylist's name and the stylist page is rendered using twig using the stylist associated with the client and all of the clients associated with the stylist
    $app->patch("/stylist/{id}", function($id) use ($app) {
        $name = $_POST['name'];
        $stylist = Stylist::find($id);
        $stylist->update($name);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
//creates a route the client's edit page and rendering client_edit storing "client" as an index to the stylist being edited
    $app->get("/client/{id}/edit", function($id) use ($app) {
        $client = Client::findByClientId($id);
        return $app['twig']->render('client_edit.html.twig', array('client' => $client));
    });
//creates a route to the client's page upon updating the client's name and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->patch("/client/{id}", function($id) use ($app) {
        $name = $_POST['name'];
        $client = Client::findByClientId($id);
        $client->update($name);
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//creates a route to the stylist's page upon deleting the stylist's name and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->delete("/stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->deleteOne();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//creates a route to the client's page upon deleting the client's name and renders index storing 'stylists' as an index to all stylists so that twig can use them
    $app->delete("/client/{id}", function($id) use ($app) {
        $client = Client::findByClientId($id);
        $client->deleteOne();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
//returns app
    return $app;
