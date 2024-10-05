@extends('layout')
@section('content')

    <section class="container-fluid page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Application Form</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="form-page">
        <div class="container">
            <div class="row">
                <div class="col-12 form-box">
                    <div class="form-inner">
                        {{-- <div class="head">
                            <h6>SREE NARAYANA COLLEGE OF NURSING, <br> SNIMS, CHALAKKA, NORTH KUTHIYATHODE P. O, NORTH PARAVOOR
                            </h6>
                            <h5>APPLICATION FORM <br>
                                <span> For Admission to B.Sc. Nursing</span> </h5>
                            <p>(Recognized by Indian Nursing Council, New Delhi, Kerala Nursing Council & <br> Kerala University of Health Sciences, Thrissur)
                            </p>
                        </div> --}}
                          <div class="col-12 marquee_text">  
                            <hr>
                            <!-- <marquee id="marquee" style="color: #ff5200">The last date of submitting the online application will be on 31/07/2023 at 5 PM >>> <a href="{{asset('/dashboard/pdf/nursing-application-notice.pdf')}}" style="color: #000">View Notice</a></marquee> -->
                            <marquee id="marquee" style="color: #ff5200">The last date of submitting the online application will be on 12/07/2024 at 5 PM</marquee>
                        </div>
                        <form method="post" id="application_form" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="row photo-row">
                                <div class="col-12 col-md-12 col-sm-12 col-xs-12 upload">
                                    <div class="inner">
                                        <div class="box">
                                            <div class="js--image-preview"></div>
                                            <div class="upload-options">
                                                <label>
                                                    <input type="file" class="image-upload" accept="image/*" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                    <label class="file-label" for="">Candidate's Photo</label>
                                    <input type="file" class="form-control file-uploader" name="profile_photo">
                                    <label class="profile_photo_error validation validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-xs-12  full mr-bt">
                                    <label>Name of the Candidate </label>
                                    <input class="form-control" type="text" name="name">
                                    <label class="name_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-md-4 col-sm-6 col-xs-12  full mr-bt">
                                    <label>Father’s / Husband ‘s / Mother’s Name</label>
                                    <input class="form-control" type="text" name="guardian">
                                    <label class="guardian_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12 mr-bt">
                                    <label>Date of Birth</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="dob"/>
                                        <label class="dob_error validation" style="color:red"></label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12 mr-bt">
                                    <label>Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender">
                                        <option selected disabled>Choose gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <label class="gender_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12 mr-bt">
                                    <label>Nationality</label>
                                    <input class="form-control" type="text" name="nationality">
                                    <label class="nationality_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-6 col-xs-12 mr-bt">
                                    <label>Religion & Caste</label>
                                    <input class="form-control" type="text" name="religion_caste">
                                    <label class="religion_caste_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4  col-md-4 col-sm-12 col-xs-12  full mr-bt">
                                    <label>Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category">
                                        <option selected disabled>Choose category</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                        <option value="OBC">OBC</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <label class="category_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12  full mr-bt">
                                    <label>Address for correspondence (Complete address including state & pincode)</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                                    <label class="address_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6 col-xs-12 mr-bt">
                                    <label>Mobile </label>
                                    <input class="form-control" type="text" name="mobile">
                                    <label class="mobile_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 col-sm-12 col-xs-12 mr-bt">
                                    <label>Email </label>
                                    <input class="form-control" type="email" name="email">
                                    <label class="email_error validation" style="color:red"></label>
                                </div>
                                <div class="col-12 mb-4 mt-4">
                                    <h6>Marks Obtained in higher secondary examination - (Grant Total)</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="marksTable">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Subjects</th>
                                                    <th>Marks Obtained </th>
                                                    <th>% of Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>English</td>
                                                    <td>
                                                        <input type="text" name="sub_en_mark" class="form-control" id="sub_en_mark" placeholder="Marks Obtained">
                                                        <label class="sub_en_mark_error validation" style="color:red"></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="sub_en_perc" class="form-control" id="sub_en_perc" placeholder="% of Marks">
                                                        <label class="sub_en_perc_error validation" style="color:red"></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Physics</td>
                                                    <td>
                                                        <input type="text" name="sub_ph_mark" class="form-control" id="sub_ph_mark" placeholder="Marks Obtained">
                                                        <label class="sub_ph_mark_error validation" style="color:red"></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="sub_ph_perc" class="form-control" id="sub_ph_perc" placeholder="% of Marks">
                                                        <label class="sub_ph_perc_error validation" style="color:red"></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chemistry</td>
                                                    <td>
                                                        <input type="text" name="sub_ch_mark" class="form-control" id="sub_ch_mark" placeholder="Marks Obtained">
                                                        <label class="sub_ch_mark_error validation" style="color:red"></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="sub_ch_perc" class="form-control" id="sub_ch_perc" placeholder="% of Marks">
                                                        <label class="sub_ch_perc_error validation" style="color:red"></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Biology</td>
                                                    <td>
                                                        <input type="text" name="sub_bi_mark" class="form-control" id="sub_bi_mark" placeholder="Marks Obtained">
                                                        <label class="sub_bi_mark_error validation" style="color:red"></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="sub_bi_perc" class="form-control" id="sub_bi_perc" placeholder="% of Marks">
                                                        <label class="sub_bi_perc_error validation" style="color:red"></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <div class="add-btn-row">
                                            <input type="button" class="button add-btn" value="Add New" onclick="addField();">
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6>Certificates to be attached with the Application Form</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>SSLC / Equivalent certificate (attested copy)</label>
                                            <input type="file" class="form-control file-uploader" name="certi_sslc">
                                            <label class="certi_sslc_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>Attested copy of Senior Secondary School Examination (10 +2)</label>
                                            <input type="file" class="form-control file-uploader" name="certi_hs">
                                            <label class="certi_hs_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>Attested copy of Medical Fitness Certificate on prescribed Performa from registered Medical Officer.</label>
                                            <input type="file" class="form-control file-uploader" name="certi_medical">
                                            <label class="certi_medical_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>Self-attested copy of TC and Contact Certificate</label>
                                            <input type="file" class="form-control file-uploader" name="certi_tc_cc">
                                            <label class="certi_tc_cc_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>Copy of Migration Certificate (for out of state candidate)</label>
                                            <input type="file" class="form-control file-uploader" name="certi_migration">
                                            <label class="certi_migration_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>If belonging to SC / ST / OBC (Enclose copies of Caste Certificate).</label>
                                            <input type="file" class="form-control file-uploader" name="certi_category">
                                            <label class="certi_category_error validation" style="color:red"></label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                                            <label class="file-label" for="" multiple>Signature</label>
                                            <input type="file" class="form-control file-uploader" name="signature">
                                            <label class="signature_error validation" style="color:red"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 30px;">
                                    <h6>Account Details</h6>
                                    <p>Application fee of <b>Rs.1000</b> to be paid to the following bank account</p>
                                    <p>SREE NARAYANA COLLEGE OF NURSING<br>Federal Bank Ltd,<br>North Paravur Branch<br>Current a/c No. 11250200016564<br>IFSC-FDRL0001125</p>
                                    <p>The application will be accepted only up on the payment of application fee</p>
                                    <h6>Declaration By The Applicant</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="declaration">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I hereby declare that I have read and understood the conditions of eligibility for the programme for which I seek admission. If fulfill the minimum eligibility criteria and I have provided necessary information in this regard. In the event of any information being found incorrect or misleading, my candidature shall be liable to cancellation at any time and I shall not be entitled to refund of any fee paid by me.
                                        </label>
                                        <label class="declaration_error validation" style="color:red"></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <p style="color: #ff5200">Verify that the information entered and the files uploaded are accurate before pressing the 'Apply Now' button.</p>
                                </div>

                                <div class="col-12 btn-box" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary submit-application">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection
 @section('script')

    {{-- SUBMITTING FORM | 01-12-2022 --}}
    <script>
    $(document).on('click', '.submit-application', function(e) {
        
        e.preventDefault();
        var data = new FormData($('#application_form')[0]);
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('submit.application') }}",
            data: data,
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',

            beforeSend: function () {

                $('.submit-application').attr("disabled","disabled");
                $(document).find('label.validation').text('');
                $('select').removeClass('error');
                $('input').removeClass('error');
            },
            success: function(response){

                if(response.status==0)
                {
                    $.each(response.error, function(prefix, val) {
                        $('#' + prefix).addClass('error');
                        $('label.' + prefix + '_error').text(val[0]);
                    });
                    toastr.error('All fields are required!');
                } 
                else if(response.status==2)
                {
                    toastr.error(response.message);
                }
                else
                { 
                    toastr.success(response.message);
                    
                    setInterval(function(){
                          window.location.href = '/view-application/'+response.unique_id+'/'; // this will run after every 2 seconds
                      }, 2000);
                    document.getElementById("success-link").href = '/view-application/'+response.unique_id+'/';
                }
                $(".submit-application").removeAttr("disabled");
            }
        })

    });
    </script>
    {{-- END --}}
    <script>
        //date picker
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
    <script type="text/javascript">
        function addField(argument) {
            var myTable = document.getElementById("marksTable");
            var currentIndex = myTable.rows.length;
            var currentRow = myTable.insertRow(-1);

            var subjectBox = document.createElement("input");
            subjectBox.setAttribute("name", "subject" + currentIndex);
            subjectBox.setAttribute("class", "form-control");
            subjectBox.setAttribute("placeholder", "Subject");

            var marksObtainedBox = document.createElement("input");
            marksObtainedBox.setAttribute("name", "marksObtained" + currentIndex);
            marksObtainedBox.setAttribute("class", "form-control");
            marksObtainedBox.setAttribute("placeholder", "Marks Obtained");

            var markPercentageBox = document.createElement("input");
            markPercentageBox.setAttribute("name", "markPercentage" + currentIndex);
            markPercentageBox.setAttribute("class", "form-control");
            markPercentageBox.setAttribute("placeholder", "% of Marks");



            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(subjectBox);

            currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(marksObtainedBox);

            currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(markPercentageBox);

            // currentCell = currentRow.insertCell(-1);
            // currentCell.appendChild(addRowBox);
        }
    </script>
    <script type="text/javascript">
        $("#marquee").hover(function () { 
            this.stop();
        }, function () {
            this.start();
        });
    </script>
    <script>
        // Start marquee
        $('.marquee_text').marquee({
            direction: 'left',
            duration: 15000,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: false,
            startVisible: false,
            pauseOnHover: true
        });
    </script>
 @endsection