<?php
app()->registerMiddleware('auth', function () {
  $user = auth()->user();

  if (!$user) {
    // user is not logged in
    response()->exit([
      'result_code' => 'UNAUTHORIZED',
      'result' => auth()->errors(),
    ], 401);
  }
});