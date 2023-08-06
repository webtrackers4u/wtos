<?php
require __DIR__ . "/../vendor/autoload.php";
app()->setBasePath("/api");
app()->get("/", function () {
  response()->json(["message" => "Hello World!"]);
});
app()->get("/gfh", function () {
  response()->json(["message" => "Hello World!"]);
});
app()->run();

?>