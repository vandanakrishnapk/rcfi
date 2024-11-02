@extends('layout')
@section('content')

    <section class="container-fluid page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Application Details</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="form-page">
        <div class="container">
            <div class="row">
                <div class="col-12 form-box">
                    <div class="form-inner">
                        <div class="alert alert-success" role="alert">
                            <strong>Congratulations!,</strong> The application for BSc. Nursing has been successfully submitted. please download the details for fututre reference.
                          </div>
                        @foreach($applicant_details as $applicant_detail)
                        <div class="row photo-row mb-3 mt-3">
                            <div class="col-12 col-md-3 col-sm-12 col-xs-12 upload">
                                <div class="inner">
                                    <div class="box">
                                        <img src="{{ asset('../documents24/pp/'.$applicant_detail->profile_photo.'') }}" width="auto" height="150px" style="border:1px solid #4e4e4e;padding:5px"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Application Number</th>
                                        <th scope="col">{{ $applicant_detail->application_no }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Full Name</th>
                                        <td scope="col">{{ $applicant_detail->name }}</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="col">Name of Guardian</th>
                                        <td scope="col">{{ $applicant_detail->guardian }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Date of Birth</th>
                                        <td scope="col">{{ date("d-m-Y", strtotime($applicant_detail->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Gender</th>
                                        <td scope="col">{{ $applicant_detail->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Nationality</th>
                                        <td scope="col">{{ $applicant_detail->nationality }}</td>
                                    </tr>
                                    </tbody>
                                </table> 
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                <table class="table table-bordered" style="background-color:#F6F6F6">
                                    <tbody>
                                        <tr>
                                            <th scope="col">Religion & Caste</th>
                                            <td scope="col">{{ $applicant_detail->religion_caste }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <td scope="col">{{ $applicant_detail->category }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Address</th>
                                            <td scope="col">{{ $applicant_detail->address }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Mobile</th>
                                            <td scope="col">{{ $applicant_detail->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                            <td scope="col">{{ $applicant_detail->email }}</td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                <table class="table table-bordered" style="background-color:#F6F6F6">
                                    <tbody>
                                        <tr>
                                            <th scope="col" colspan="3">Academic Details</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col">Percentage (%)</th>
                                        </tr>
                                        <tr>
                                            <td scope="col">English</td>
                                            <td scope="col">{{ $applicant_detail->sub_en_mark }}</td>
                                            <td scope="col">{{ $applicant_detail->sub_en_perc }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">Physics</td>
                                            <td scope="col">{{ $applicant_detail->sub_ph_mark }}</td>
                                            <td scope="col">{{ $applicant_detail->sub_ph_perc }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">Chemistry</td>
                                            <td scope="col">{{ $applicant_detail->sub_ch_mark }}</td>
                                            <td scope="col">{{ $applicant_detail->sub_ch_perc }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">Biology</td>
                                            <td scope="col">{{ $applicant_detail->sub_bi_mark }}</td>
                                            <td scope="col">{{ $applicant_detail->sub_bi_perc }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table> 
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                <table class="table table-bordered" >
                                    <tbody>
                                        <tr>
                                            <th scope="col" colspan="2">Documents Submitted</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td scope="col">SSLC Certificate</td>
                                            {{-- <td scope="col"><a class="badge bg-success" style="cursor:pointer" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='white'" href="{{ asset('documents/sslc/'.$applicant_detail->certi_sslc.'') }}" target="#_blank">View Certificate</a></td> --}}
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td scope="col">Higher Secondary Certificate</td>
                                            {{-- <td scope="col">{{ $applicant_detail->certi_hs }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td scope="col">Medical Certificate</td>
                                            {{-- <td scope="col">{{ $applicant_detail->certi_medical }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td scope="col">TC & CC Certificate</td>
                                            {{-- <td scope="col">{{ $applicant_detail->certi_tc_cc }}</td> --}}
                                        </tr>
                                        @if($applicant_detail->certi_category != 'No')
                                        <tr>
                                            <td>5</td>
                                            <td scope="col">Category Certificate</td>
                                            {{-- <td scope="col">{{ $applicant_detail->certi_category }}</td> --}}
                                        </tr>
                                        @endif
                                        @if($applicant_detail->certi_migration != 'No')
                                        <tr>
                                            <td>6</td>
                                            <td scope="col">Migration Certificate</td>
                                            {{-- <td scope="col">{{ $applicant_detail->certi_migration }}</td> --}}
                                        </tr>
                                        @endif
                                       
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <p style="color: #ff5200">Please download and keep for future references</p>
                        </div>
                        
                        <div class="col-12 btn-box" style="margin-top: 30px;">
                            <a type="submit" class="btn btn-warning btn-sm submit-application" href="/download-application/{{ $applicant_detail->unique_id }}">Download Now</a>
                        </div>
                        @endforeach
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection