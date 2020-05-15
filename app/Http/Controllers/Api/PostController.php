<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index() {
        try {
            $response = json_decode(file_get_contents('http://localhost:8001/posts'), true);
            return response()->json(['status' => 'success', 'message' => $response]);
        } catch(\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }

    }
}
