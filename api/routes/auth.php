<?php
app()->post("/login", function () {
    $request = request();
    $username = $request->get("username");
    $password = $request->get("password");

    $user = auth()->login([
        'username' => $username,
        'password' => $password
    ]);

    if ($user) {
        // user is authenticated
        response()->json([
            "result_code" => "200",
            "message" => "Successfully logged in",
            "result" => $user
        ]);
    } else {
        // error while logging in
        response()->exit([
            'result_code' => 'UNAUTHORIZED',
            'result' => auth()->errors(),
        ], 401);
    }
});
