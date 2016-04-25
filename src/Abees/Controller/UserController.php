<?php
namespace Abees\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Abees\Model\User;
use Valitron\Validator;

class UserController extends ApiController
{
    public function getAllUserAction(Request $request, Response $response)
    {        
        $user = new User();
        $user = User::all();

        if($user) {
            $responseData = [
                'status_code' => 201,
                'status_message' => 'Success',
                'data'  => $user,
            ];
        } else {
            $responseData = [
                'status_code' => 403,
                'status_message' => 'Error',
                'data'  => 'User Not Found',
            ];
        }

        return $this->jsonResponse($response, $responseData);
    }

    public function getUserByNumberIdAction(Request $request, Response $response)
    {        
        $get = $request->getParsedBody();
        $v = new Validator($get);
        $v->rule('required', 'number_id');
        if($v->validate()) {
            $user = new User();
            $user = User::where('number_id',$get['number_id'])->first();
            if($user) {
                $responseData = [
                    'status_code' => 201,
                    'status_message' => 'Success',
                    'data'  => $user,
                ];
            } else {
                $responseData = [
                    'status_code' => 403,
                    'status_message' => 'Error',
                    'data'  => 'User Not Found',
                ];
            }
        } else {
            $responseData = [
                'status_code' => 400,
                'status_message' => 'Error',
                'data'  => $v->errors(),
            ];
        }

        return $this->jsonResponse($response, $responseData);
    }

    public function createAction(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $v = new Validator($post);
        $v->rule('required', 'name');
        $v->rule('required', 'number_id');
        if($v->validate()) {
            $user = New User();
            $user->name = $post['name'];
            $user->number_id = $post['number_id'];
            $user->image = $post['image'];

            $save = $user->save();

            $responseData = [
                'status_code' => 201,
                'status_message' => 'Success',
                'data'  => $save,
            ];
        } else {
            $responseData = [
                'status_code' => 400,
                'status_message' => 'Error',
                'data'  => $v->errors(),
            ];
        }

        return $this->jsonResponse($response, $responseData);
    }

}
