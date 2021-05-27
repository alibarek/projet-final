<?php
	
	namespace App\Http\Controllers\API;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Http\Resources\WebUserResource;
	use DB;
	use App\Models\WebUser;
	
	class WebUserController extends Controller
	{
		public function register(Request $request)
		{
			/*$validatedData = $request->validate([
				
				'email' => 'email|required|unique:web_users',
				
			]);*/
			
			//$validatedData['password'] = Hash::make($request->password);
			$checkEmail = WebUser::where('email','=',$request->email)->get();
			if(count($checkEmail)>0){
				return response(['error' => $checkEmail], 401);
				}else{
				$data = $request->all();
				$user = WebUser::create($data);
				
				//$accessToken = $user->createToken('authToken')->accessToken;
				
				return response(['user' => $checkEmail], 201);
			}
		}
		
		public function login(Request $request)
		{
			$loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
			]);
			
			$user = WebUser::where('email','=',$request->email)->where('password','=',$request->password)->get();
			if(count($user)>0){
				
				return response(['user' => $user]);
			}
			return response(['message' => 'This User does not exist, check your details'], 400);
			
		}
		
		public function index()
		{
			$users = WebUser::all();
			return response([ 'users' => WebUserResource::collection($users), 'message' => 'Retrieved successfully'], 200);
		}
		
		
		public function store(Request $request)
		{
			
		}
		
		public function show(int $id)
		{
			
		}
		
		
		public function update(Request $request)
		{
			
		}
		
		
		public function destroy(int $id)
		{
			DB::table('web_users')->where('id','=',$id)->delete();
			return response(['message' => 'Deleted']);
		}
	}
