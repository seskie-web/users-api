<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Interfaces\AuthorRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{   
    public function __construct(public AuthorRepositoryInterface $authorRepository){}
  
    /**
     * Get all authors
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $entries = $this->authorRepository->all();
        return ResponseClass::sendResponse(AuthorResource::collection($entries),'DB entries', 200);
    }

    /**
     * Store a new resource
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)  
    {   
        // Define custom validation rules
        $rules = [
            'email' => 'required|email|unique:authors,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'cellphone' => 'required',
        ];

        // Create a custom validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Customize the error response
            return response()->json([
                'success' => false,
                'message' => 'Validation Errors: ',
                'data' => $validator->errors(),
            ], 422);
        }

        // Retrieve validated data
        $validatedData = $validator->validated();
        $validatedData['message'] = $request->message;

        try {
            DB::beginTransaction();

            $author = $this->authorRepository->create($validatedData);

            DB::commit();
            return ResponseClass::sendResponse(new AuthorResource($author),'New author has been created successfully',201);

        }catch(\Exception $ex){
            return ResponseClass::rollback($ex->getMessage());
        }
    }

}
