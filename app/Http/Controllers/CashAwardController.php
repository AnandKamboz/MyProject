<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashAward;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;




class CashAwardController extends Controller
{
    public function storeFirstStep(Request $request)
    {
        $apiData = $request->all();

        // \Log::info('Received API Data:', $apiData);
         $pin_code = $apiData['pinCode'] ?? 'Not Provided';
         $dist = $apiData['district'] ?? 'Not Provided';
        //  Log::info("Dist: " . $dist);


        do {
            $secureId = Str::random(32);
        } while (CashAward::where('secure_id', $secureId)->exists());

        do {
            $application_id = Str::random(32);
        } while (CashAward::where('secure_id', $application_id)->exists());

        $existingRecord = CashAward::where('member_id', $request->member_id)->where('is_completed', 0)->first();
        $dob = $request->dob ? Carbon::parse($request->dob)->format('Y-m-d') : null;


        if ($existingRecord) {
            $existingRecord->update([
                'mobile_number' => $request->mobileNumber,
                'family_id' => $request->family_id,
                'member_id' => $request->member_id,
                'district' => $dist,
                'pin_code' => $request->pincode,
                'name' => $request->name,
                'gender' => $request->gender,
                'father_name' => $request->fathername,   
                'mother_name' => $request->mothername,
                'date_of_birth' => $dob,
                'player_address' => $request->fullAddress,
                'district_id' => $request->distid,
                
            ]);
        } else {
            CashAward::create([
                'secure_id' => $secureId,
                'mobile_number' => $request->mobileNumber,
                'family_id' => $request->family_id,
                'member_id' => $request->member_id,
                'district' => $dist,
                'pin_code' => $request->pincode,
                'name' => $request->name,
                'gender' => $request->gender,
                'father_name' => $request->fathername,   
                'mother_name' => $request->mothername,
                'date_of_birth' => $dob,
                'player_address' => $request->fullAddress,
                'application_id' => $application_id,
                'district_id' => $request->distid,
            ]);
        }


    }

    public function storeSecondStep(Request $request)
    {
        // Log::info('Received email:', ['email' => $request->email , 'member_id' => $request->member_id]);
        CashAward::where(['member_id'=>$request->member_id,'is_completed'=>0])->update([
            'email' => $request->email,
        ]);

    }

    public function userAllRecord(Request $request){
        $record = CashAward::where('member_id',$request->member_id)->first();
        if ($record) {
        return response()->json([
            'status' => 'success',
            'data' => $record,
        ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Cash award not found for this member.',
            ], 404);
        }
    }

    public function storeThirdStep(Request $request){
         $apiData = $request->all();

        \Log::info('Received API Data:', $apiData);
    }

}
