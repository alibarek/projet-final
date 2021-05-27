<?php
	
	namespace App\Http\Controllers\API;
	
	use App\Http\Controllers\Controller;
	use App\Models\Doctors;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use App\Http\Resources\DoctorResource;
	use DB;
	
	class DoctorController extends Controller
	{
		/**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function index()
		{
			$doctors = Doctors::all();
			return response([ 'doctor' => DoctorResource::collection($doctors), 'message' => 'Retrieved successfully'], 200);
		}
		
		/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
		*/
		public function store(Request $request)
		{
			$data = $request->all();
			
			$validator = Validator::make($data, [
            'name' => 'required|max:255',
			]);
			
			if ($validator->fails()) {
				return response(['error' => $validator->errors(), 'Validation Error']);
			}
			
			$doctors = Doctors::create($data);
			
			return response(['doctor' => new DoctorResource($doctors), 'message' => 'Created successfully'], 201);
		}
		
		
		/**
			* Display the specified resource.
			*
			* @param  \App\Models\Doctors  $doctors
			* @return \Illuminate\Http\Response
		*/
		public function show(int $id)
		{
			$doctor = Doctors::where('id','=',$id)->get();
			return response(['doctor' => $doctor, 'message' => 'Retrieved successfully'], 200);
		}
		
		/**
			* Update the specified resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  \App\Models\Doctors  $doctors
			* @return \Illuminate\Http\Response
		*/
		public function updateDoctor(Request $request)
		{
			$id = $request->id;
			DB::table('doctors')->where('id','=', $id)->update($request->all());
			$doctors = Doctors::where('id','=',$id)->get();
			return response(['doctor' => $doctors, 'message' => 'Updated' ], 200);//'Update successfully'
		}
		
		/**
			* Remove the specified resource from storage.
			*
			* @param  \App\Models\Doctors  $doctors
			* @return \Illuminate\Http\Response
		*/
		public function destroy(int $id)
		{
			//$doctors->delete();
			DB::table('doctors')->where('id','=',$id)->delete();
			return response(['message' => 'Deleted']);
		}
	}
