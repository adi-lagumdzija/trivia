<?php

/**
 * @OA\Info(title="Trivia API", version="0.1")
 * @OA\OpenApi(
 *   @OA\Server(url="http://localhost:8080/trivia/api/", description="Development Environment" )
 * )
 */

 /**
 * @OA\Get(path="/users",
 *     @OA\Response(response="200", description="List of users from database")
 * )
 */
Flight::route('GET /users', function(){
    Flight::json(Flight::userDao()->get_all_users());
});

/**
 * @OA\Get(path="/users/{id}",
 *    @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true,name="id", default=1),
 *     @OA\Response(response="200", description="List of users from database based on id")
 * )
 */
Flight::route('GET /users/@id', function($id){
    Flight::json(Flight::userDao()->get_user_by_id($id));
});
/**
 * @OA\Post(path="/users",
 *     @OA\Response(response="200", description="Add users")
 * )
 */
Flight::route('POST /users', function(){
    $request = Flight::request()->data->getData();;
    Flight::json(Flight::userDao()->add($data));
});

/**
 * @OA\Put(path="/users/{id}",
 * @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true,name="id", default=1),
 *     @OA\Response(response="200", description="Update users based on id")
 * )
 */
Flight::route('PUT /users/@id', function($id){
    $dao = new UserDao();
    $request = Flight::request();
    $data = $request->data->getData();
    $dao->update($id, $data);
    $users = $dao->get_user_by_id($id);
    Flight::json($users);
});



?>
