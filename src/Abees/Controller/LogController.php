<?php
namespace Abees\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Abees\Model\User;
use Abees\Model\Log;
use Valitron\Validator;

class LogController extends ApiController
{
    public function saveLogAction(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $v = new Validator($post);
        $v->rule('required', 'number_id');
        if($v->validate()) {
            $user = User::where('number_id', $post['number_id'])->first();

            if($user) {
                $log = New Log();
                $log->number_id = $post['number_id'];
                $log->description = $post['description'];
                $log->save();

                $responseData = [
                    'status_code' => 201,
                    'status_message' => 'Success',
                    'data'  => $log,
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

    public function getAllLogAction(Request $request, Response $response)
    {
        $data = Log::all();

        $responseData = [
            'status_code' => 201,
            'status_message' => 'Success',
            'data'  => $data,
        ];

        return $this->jsonResponse($response, $responseData);   
    }

    public function getAllLogByNumberIdAction(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $v = new Validator($post);
        $v->rule('required', 'number_id');
        if($v->validate()) {
            $data = Log::where('number_id', $post['number_id'])->get();

            $responseData = [
                'status_code' => 201,
                'status_message' => 'Success',
                'data'  => $data,
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
