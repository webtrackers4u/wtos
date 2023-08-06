<?php
require __DIR__ . "/../wtosConfig.php";
require __DIR__ . "/config/auth.php";
require __DIR__ . "/config/db.php";
require __DIR__ . "/config/middleware.php";

app()->setBasePath("/api");
app()->get("/", function () {
  response()->json(["message" => "Hello World!"]);
});
app()->get("/home", function () {
  response()->json(["message" => "Hello World!"]);
});

app()->group('/auth', function(){
  require __DIR__."/routes/auth.php";
});
  

app()->group('/', [
  'middleware' => 'auth',
  function () {
    app()->get("/me", function () {
      response()->json(["message" => "Hello World!"]);
    });
  }
]);
app()->run();
