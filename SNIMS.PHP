<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // SUBMIT APPLICATION | 01-12-2022
    public function submitApplication(Request $request){
        $validator = Validator::make($request->all(),[
            
            'profile_photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'guardian' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'religion_caste' => 'required',
            'category' => 'required',
            'address' => 'required',
            'mobile' => 'required|unique:applications',
            'email' => 'required|email|unique:applications',
            'sub_en_mark' => 'required',
            'sub_en_perc' => 'required',
            'sub_ph_mark' => 'required',
            'sub_ph_perc' => 'required',
            'sub_ch_mark' => 'required',
            'sub_ch_perc' => 'required',
            'sub_bi_mark' => 'required',
            'sub_bi_perc' => 'required',
            'declaration' => 'accepted',
            'certi_sslc' => 'required|mimes:pdf|max:2048',
            'certi_hs' => 'required|mimes:pdf|max:2048',
            'certi_medical' => 'required|mimes:pdf|max:2048',
            'certi_tc_cc' => 'required|mimes:pdf|max:2048',
            'certi_category' => 'required_if:category,SC,ST,OBC|mimes:pdf|max:2048',
            'signature' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],
        
        [
            'name.required' => 'Name is required',
            'guardian.required' => 'Guardian name is required',
            'dob.required' => 'Date of birth is required',
            'gender.required' => 'Gender is required',
            'nationality.required' => 'Nationality is required',
            'religion_caste.required' => 'Religion & Caste name is required',
            'category.required' => 'Category is required',
            'address.required' => 'Full address is required',
            'mobile.required' => 'Mobile number is required',
            'email.required' => 'Email id is required',
            'sub_en_mark.required' => 'English Mark?',
            'sub_en_perc.required' => 'Percentage of English?',
            'sub_ph_mark.required' => 'Physics Mark?',
            'sub_ph_perc.required' => 'Percentage of Physics?',
            'sub_ch_mark.required' => 'Chemistry Mark?',
            'sub_ch_perc.required' => 'Percentage of Chemistry?',
            'sub_bi_mark.required' => 'Biology Mark?',
            'sub_bi_perc.required' => 'Percentage of Biology?',
            'declaration.accepted' => 'Please agree the declaration',
            'profile_photo.required' => 'Candidate photo is required',
            'profile_photo.mimes' => 'Only png/jpg/jpeg files are allowed',
            'profile_photo.max' => 'Max file size is 2MB',
            'certi_sslc.required' => 'SSLC Ceritificate is required',
            'certi_hs.required' => 'Higher Secondary Ceritificate is required',
            'certi_medical.required' => 'Medical Ceritificate is required',
            'certi_tc_cc.required' => 'TC & CC Ceritificate is required',
            'certi_category.required_if' => 'Certificate of category is required',
            'signature.required' => 'Signature is required',
            'signature.mimes' => 'Only png/jpg/jpeg files are allowed',
            'signature.max' => 'Max file size is 2MB',

        ]);
        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()]);
        }
        else{

            // CREATING APPLICATION NUMBER
            $last_reg_num = 0 ;
            $getLastID = DB::table('applications_24')->select('application_no')->orderby('id','DESC')->first();
            if($getLastID){
                $last_reg_num = substr($getLastID->application_no, -3);
            } else{
                $last_reg_num = sprintf("%03d", $last_reg_num);
            }
            $stdId =  sprintf("%03d", $last_reg_num+1);
            $application_no = 'SNCON-WEB24'.$stdId;

            if($request->file('profile_photo')) {
                $profile_photo = $request->file('profile_photo');
                $profile_photo_filename = $application_no.'_photo.'.$profile_photo->getClientOriginalExtension();
       
                // File upload location
                $profile_photo_location = 'documents24/pp';
       
                // Upload file
                $profile_photo->move($profile_photo_location,$profile_photo_filename);
            }
            if($request->file('signature')) {
                $signature = $request->file('signature');
                $signature_filename = $application_no.'_signature.'.$signature->getClientOriginalExtension();
       
                // File upload location
                $signature_location = 'documents24/signature';
       
                // Upload file
                $signature->move($signature_location,$signature_filename);
            }

            if($request->file('certi_sslc')) {
                $certi_sslc = $request->file('certi_sslc');
                $certi_sslc_filename = $application_no.'_sslc.'.$certi_sslc->getClientOriginalExtension();
       
                // File upload location
                $certi_sslc_location = 'documents24/sslc';
       
                // Upload file
                $certi_sslc->move($certi_sslc_location,$certi_sslc_filename);
            }

            if($request->file('certi_hs')) {
                $certi_hs = $request->file('certi_hs');
                $certi_hs_filename = $application_no.'_hs.'.$certi_hs->getClientOriginalExtension();
       
                // File upload location
                $certi_hs_location = 'documents24/hs';
       
                // Upload file
                $certi_hs->move($certi_hs_location,$certi_hs_filename);
            }

            if($request->file('certi_medical')) {
                $certi_medical = $request->file('certi_medical');
                $certi_medical_filename = $application_no.'_medical.'.$certi_medical->getClientOriginalExtension();
       
                // File upload location
                $certi_medical_location = 'documents24/medical';
       
                // Upload file
                $certi_medical->move($certi_medical_location,$certi_medical_filename);
            }

            if($request->file('certi_tc_cc')) {
                $certi_tc_cc = $request->file('certi_tc_cc');
                $certi_tc_cc_filename = $application_no.'_cc.'.$certi_tc_cc->getClientOriginalExtension();
       
                // File upload location
                $certi_tc_cc_location = 'documents24/cc';
       
                // Upload file
                $certi_tc_cc->move($certi_tc_cc_location,$certi_tc_cc_filename);
            }

            if($request->file('certi_migration')) {
                $certi_migration = $request->file('certi_migration');
                $certi_migration_filename = $application_no.'_migration.'.$certi_migration->getClientOriginalExtension();
       
                // File upload location
                $certi_migration_location = 'documents24/migration';
       
                // Upload file
                $certi_migration->move($certi_migration_location,$certi_migration_filename);
            } else{
                $certi_migration_filename = 'No';
            }

            if($request->file('certi_category')) {
                $certi_category = $request->file('certi_category');
                $certi_category_filename = $application_no.'_categoary.'.$certi_category->getClientOriginalExtension();
       
                // File upload location
                $certi_category_location = 'documents24/categoary';
       
                // Upload file
                $certi_category->move($certi_category_location,$certi_category_filename);
            } else{
                $certi_category_filename = 'No';
            }

            $unique_id = Str::random(30);
            $data=array(
                'application_no' => $application_no,
                'profile_photo' => $profile_photo_filename,
                'name' => $request->input('name'),
                'guardian' => $request->input('guardian'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'nationality' => $request->input('nationality'),
                'religion_caste' => $request->input('religion_caste'),
                'category' => $request->input('category'),
                'address' => $request->input('address'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'sub_en_mark' => $request->input('sub_en_mark'),
                'sub_ph_mark' => $request->input('sub_ph_mark'),
                'sub_ch_mark' => $request->input('sub_ch_mark'),
                'sub_bi_mark' => $request->input('sub_bi_mark'),
                'sub_en_perc' => $request->input('sub_en_perc'),
                'sub_ph_perc' => $request->input('sub_ph_perc'),
                'sub_ch_perc' => $request->input('sub_ch_perc'),
                'sub_bi_perc' => $request->input('sub_bi_perc'),
                'certi_sslc' => $certi_sslc_filename,
                'certi_hs' => $certi_hs_filename,
                'certi_medical' => $certi_medical_filename,
                'certi_tc_cc' => $certi_tc_cc_filename,
                'certi_migration' => $certi_migration_filename,
                'certi_category' => $certi_category_filename,
                'signature' => $signature_filename,
                'unique_id' => $unique_id,
            );

            // CHanged here the table from applications_23 to applications_231
            if(DB::table('applications_24')->insert($data)){
                return response()->json([
                    'status' => 1,
                    'message' => 'Application Submitted successfully!', 
                    'unique_id' => $unique_id, 
                ]);
            } else{
                return response()->json([
                    'status' => 2,
                    'message' => 'Something went wrong!', 
                ]);
            }
        }
    }

    public function viewApplication(){
        
        $unique_id = request()->segment(2);
        $applicant_details = DB::table('applications_24')->where('unique_id',$unique_id)->get();
        return view('view_application',compact('applicant_details'));

        // return $pdf->download('itsolutionstuff.pdf');

    }

    public function downloadApplication(){
        
        $unique_id = request()->segment(2);
        $applicant_details = DB::table('applications_24')->where('unique_id',$unique_id)->get();
        $date_time = DB::table('applications_24')->select('updated_at')->where('unique_id',$unique_id)->value('updated_at');
        $dateTime = \Carbon\Carbon::parse($date_time);
        $dateTime->addHours(10)->addMinutes(30);

        // Format the updated date and time as desired (e.g., 'd/m/Y h:i A')
        $application_time = $dateTime->format('d/m/Y h:i A');
        $pdf = PDF::loadView('download_application',compact('applicant_details','application_time'));
        return $pdf->download('snims-nursing-application.pdf');

    }
}
