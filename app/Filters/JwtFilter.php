<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\Key;
use Config\Services;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Exception;

class JwtFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Mengizinkan CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

        $header = $request->getServer('HTTP_AUTHORIZATION');

        // Check if Authorization header is present
        if (!$header || empty($header)) {
            return Services::response()->setJSON([
                'status' => 401,
                'error' => true,
                'messages' => [
                    'error' => 'Authorization header is missing.'
                ]
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        // Extract the token from the Authorization header
        $tokenParts = explode(' ', $header);

        // Check if the token has the expected number of segments
        if (count($tokenParts) !== 2) {
            return Services::response()->setJSON([
                'status' => 401,
                'error' => true,
                'messages' => [
                    'error' => 'Invalid token format.'
                ]
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        try {
            $encodedToken = $tokenParts[1];

            // Use configuration for JWT key
            $key = getenv('JWT_SECRET_KEY');

            $decodedtoken = JWT::decode($encodedToken, new Key($key, 'HS256'));

            $userModel = new UserModel();
            $validUser = $userModel->getIdentitas($decodedtoken->identitas);
            if (!$validUser) {
                return Services::response()->setJSON([
                    'status' => 401,
                    'error' => true,
                    'messages' => [
                        'error' => 'Invalid token.'
                    ]
                ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
            }
            return $request;
        } catch (Exception $e) {
            return Services::response()->setJSON([
                'status' => 401,
                'error' => true,
                'messages' => [
                    'error' => $e->getMessage()
                ]
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}