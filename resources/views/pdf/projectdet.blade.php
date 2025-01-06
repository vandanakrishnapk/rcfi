@php
    use Carbon\Carbon;
@endphp


<!DOCTYPE html>
<html>
<head>
    <title>Project Details</title>
    <style>
        table,th,td 
        {
            border:1px solid rgb(231, 225, 225);border-collapse:collapse;
            width:100%;
            padding:9px;
        }
        .pdf {
        width: 100%;
        aspect-ratio: 4 / 3;
        }

   
    </style>
    
</head>
<body>
  <h3 style="background-color:rgb(200, 196, 196);border-radius:0.5rem;text-align:center;color:white;padding:5px;font-size:32px">PROJECT DETAILS</h3>
  <table>
    <tr>
        <th>Project ID</th>
        <td>{{ $project->projectID }}</td>
    </tr>
    <tr>
        <th>Type Of Project</th>
        <td>{{ $project->typeOfProject }}</td>
    </tr>
    <tr>
        <th>Agency Project No</th>
        <td>{{ $project->agencyProjectNo }}</td>
    </tr> 
    <tr>
        <th>Donor Name</th>
        <td>{{ $project->partner_name }}</td>
    </tr>
    <tr>
        <th>Project Manager</th>
        <td>{{ $project->name }}</td>
    </tr>
    <tr>
        <th>Available Budget</th>
        <td>{{ $project->availableBudget }}</td>
    </tr>

  </table>
  
  <h3 style="background-color:rgb(200, 196, 196);border-radius:0.5rem;text-align:center;color:white;padding:5px;font-size:32px">APPLICANT DETAILS</h3>
@if($appdetOC)
<div class="container">
  <div class="row mt-4">
    <div class="col-12">
        <table class="table table-striped table-bordered">
            <thead>
               
            </thead>
            <tbody>
                @foreach ($requiredKeys as $key)
                    <tr>
                        <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                        <td><strong>{{ $appdetOC->$key }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
  </div>
</div>
@endif

@if($appdetEC)
<div class="container">
   <div class="row mt-4">
    <div class="col-10">
        <table class="table table-striped table-bordered">
            <thead>
               
            </thead>
            <tbody>
                @foreach ($requiredKeys as $key)
                    <tr>
                        <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                        <td><strong>{{ $appdetEC->$key }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
   </div>
</div>
@endif

@if($appdetSW)
<div class="container">
    <div class="row mt-4">
     <div class="col-10">
<table class="table table-striped table-bordered">
<thead>
                
</thead>
<tbody>
@foreach ($requiredKeys as $key)
<tr>
<td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
<td>
    @if ($key === 'beneficiaries')
        <ul>
            @foreach (json_decode($appdetSW->$key, true) as $beneficiary)
                {{ $beneficiary['name'] }} - {{ $beneficiary['phone_number'] }}</li>
            @endforeach
        </ul>
    @else
        <strong>{{ $appdetSW->$key }}</strong>
    @endif
</td>
</tr>
@endforeach
             </tbody>
         </table>
         
     </div>
    </div>
 </div>
@endif  

@if($appdetCC)
<div class="container">
    <div class="row mt-4">
     <div class="col-10">
         <table class="table table-striped table-bordered">
             <thead>
                
             </thead>
             <tbody>
                 @foreach ($requiredKeys as $key)
                     <tr>
                         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                         <td><strong>{{ $appdetCC->$key }}</strong></td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
         
     </div>
    </div>
 </div>
 
@endif
@if($appdetDA)
<div class="container">
<div class="row mt-4">
 <div class="col-10">
     <table class="table table-striped table-bordered">
         <thead>
            
         </thead>
         <tbody>
             @foreach ($requiredKeys as $key)
                 <tr>
                     <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                     <td><strong>{{ $appdetDA->$key }}</strong></td>
                 </tr>
             @endforeach
         </tbody>
     </table>
     
 </div>
</div>
</div>

@endif

@if($appdetFA)
<div class="container">
<div class="row mt-4">
<div class="col-10">
 <table class="table table-striped table-bordered">
     <thead>
        
     </thead>
     <tbody>
         @foreach ($requiredKeys as $key)
             <tr>
                 <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                 <td><strong>{{ $appdetFA->$key }}</strong></td>
             </tr>
         @endforeach
     </tbody>
 </table>
 
</div>
</div>
</div>

@endif 
@if($appdetGP)
<div class="container">
<div class="row mt-4">
<div class="col-10">
<table class="table table-striped table-bordered">
 <thead>
    
 </thead>
 <tbody>
     @foreach ($requiredKeys as $key)
         <tr>
             <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
             <td><strong>{{ $appdetGP->$key }}</strong></td>
         </tr>
     @endforeach
 </tbody>
</table>

</div>
</div>
</div>

@endif

@if($appdetHC)
<div class="container">
<div class="row mt-4">
<div class="col-10">
<table class="table table-striped table-bordered">
<thead>

</thead>
<tbody>
 @foreach ($requiredKeys as $key)
     <tr>
         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
         <td><strong>{{ $appdetHC->$key }}</strong></td>
     </tr>
 @endforeach
</tbody>
</table>

</div>
</div>
</div>

@endif

@if($appdetSO)
<div class="container">
<div class="row mt-4">
<div class="col-10">
<table class="table table-striped table-bordered">
<thead>

</thead>
<tbody>
 @foreach ($requiredKeys as $key)
     <tr>
         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
         <td><strong>{{ $appdetSO->$key }}</strong></td>
     </tr>
 @endforeach
</tbody>
</table>

</div>
</div>
</div>

@endif
@if($appdetHO)
<div class="container">
<div class="row mt-4">
<div class="col-10">
<table class="table table-striped table-bordered">
<thead>

</thead>
<tbody>
 @foreach ($requiredKeys as $key)
     <tr>
         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
         <td><strong>{{ $appdetHO->$key }}</strong></td>
     </tr>
 @endforeach
</tbody>
</table>

</div>
</div>
</div>

@endif 
</div>
</div>                    



  <h3 style="background-color:rgb(200, 196, 196);border-radius:0.5rem;text-align:center;color:white;padding:5px;font-size:32px">UPLOADED DOCUMENTS</h3>
  <h5 style="background-color: black;color:yellow;width:100%;text-align:center;border-radius:5rem;font-style:italic">The below files are available with this pdf</h5>
  <ol>

  @if($documents->land_document)
     <li><strong>Land Document</strong></li> 
  @endif
  @if($documents->possession_certificate)
      <li><strong>Possession Certificate</strong></li>
  @endif
  @if($documents->recommendation_letter)
      <li><strong>Recommendation Letter</strong></li>
  @endif
  @if($documents->committee_minutes)
      <li><strong>Committee Minutes</strong></li>
  @endif
  @if($documents->permit_copy)
      <li><strong>Permit Copy</strong></li>
  @endif
  @if($documents->plan)
     <li> <strong>Plan</strong></li>
  @endif
  @if($documents->tender_schedule_sheet)
      <li><strong>Tender Schedule Sheet</strong></li>
  @endif
  @if($documents->site_study)
      <li><strong>Site Study</strong></li>
  @endif
  @if($documents->quotations)
     <li><strong>Quotations</strong></li> 
  @endif
  @if($documents->quotations_approval_form)
      <li><strong>Quotations Approval Form</strong></li>
  @endif
  @if($documents->work_order_letter)
      <li><strong>Work Order Letter</strong></li>
  @endif
  @if($documents->meeting_minutes_copy)
      <li><strong>Meeting Minutes Copy</strong></li>
  @endif
  @if($documents->agreement_with_contractor)
      <li><strong>Agreement with Contractor</strong></li>
  @endif
  @if($documents->agreement_with_committee)
      <li><strong>Agreement with Committee</strong></li>
  @endif
  @if($documents->project_summary_form)
      <li><strong>Project Summary Form</strong></li>
  @endif  

</ol>

    

  <h3 style="background-color:rgb(200, 196, 196);border-radius:0.5rem;text-align:center;color:white;padding:5px;font-size:32px">FUND ALLOCATION</h3>
    <table>
     
        <tbody>
            <tr>
                <th>
                    Input
                </th>
                <th>Amount</th>
                <th>Utilized</th>
                <th>Balance</th>
                <th>Previous Current</th>
                <th>Previous Updates</th>

            </tr>
            @foreach($fund as $funds)
          
                <tr>
                    <td>{{ $funds->inputName }}</td>
                    <td>{{ $funds->amount }}</td>
                    <td>{{ $funds->utilized }}</td>
                    <td>{{ $funds->balance }}</td>
                    <td>
                        @php
                            // Clean up the JSON string
                            $cleanedPreviousCurrent = trim($funds->previous_current, '""'); // Remove outer double quotes
                            $cleanedPreviousCurrent = stripslashes($cleanedPreviousCurrent); // Unescape any remaining slashes
                            $previousCurrent = json_decode($cleanedPreviousCurrent, true); // Decode as associative array
                        @endphp
                        
                        @if (!empty($previousCurrent) && is_array($previousCurrent))
                            @foreach ($previousCurrent as $current)
                                <ul type="square" style="padding-left:1px">
                                    <li style="font-size: 10px;width:100%;padding-left:0px">
                                        Current:<span style="color:blue"> {{ $current['current value'] }}</span> <br>
                                        Updated at:<span style="color:blue"> {{ Carbon::parse($current['updated_at'])->format('d.m.Y') }}</span>
                                   
                                    </li>
                                </ul>
                                    
                            @endforeach
                        @else
                            <div>No data available</div>
                        @endif
                    </td>
                    
                    <td>
                        @php
                            // Clean previous_updates similarly
                            $cleanedPreviousUpdates = trim($funds->previous_updates, '""');
                            $cleanedPreviousUpdates = stripslashes($cleanedPreviousUpdates);
                            $previousUpdates = json_decode($cleanedPreviousUpdates, true);
                        @endphp
                        
                        @if (!empty($previousUpdates) && is_array($previousUpdates))
                            @foreach ($previousUpdates as $update)
                            <ul type="square" style="padding-left:1px">
                                <li style="font-size: 10px;width:100%;padding-left:0px">
                                    Input:<span style="color:blue">{{ $update['input_name'] }}</span> <br>
                                    Amount:<span style="color:blue">{{ $update['amount'] }}</span> <br>
                                    Updated at:<span style="color:blue">{{ Carbon::parse($update['updated_at'])->format('d.m.Y') }}</span>
                            
                                </li>
                            </ul>
                                
                            @endforeach
                        @else
                            <div>No data available</div>
                        @endif
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        <tfoot>
         <tr>
            <th></th>
            <th >Total Amount {{ $total_amount}}</th>
            <th>Total Utilized {{ $total_utilized}}</th>
            <th>Total Balance{{ $total_balance}}</th>
            <th></th>
            <th></th>
         </tr>
        </tfoot>
    </table>

  <h3 style="background-color:rgb(200, 196, 196);border-radius:0.5rem;text-align:center;color:white;padding:5px;font-size:32px">COMPLETION DETAILS</h3>
  <h5 style="background-color: black;color:yellow;width:100%;text-align:center;border-radius:5rem;font-style:italic">The below files are available with the pdf</h5>
  <div class="row">
            <div class="col-8">
                @if($completion && $completion->completion_certificate)
                <strong>1.Completion Certificate</strong>
                @else
                <strong>1.No completion certificate uploaded</strong>
                 @endif
            </div>
    </div><br>
    
    <div class="row">
      
        <div class="col-4">
            @if($completion && $completion->measurement_book)
            <strong>2.Measurement Book</strong>
            @else
                <strong>2.No measurement book uploaded</strong>
            @endif
            
        </div>
    </div>
</ol>
    <br>
    
     
   <table style="width: 100%; border-collapse: collapse; border: 2px solid secondary;">
        <tr>
            @foreach (range(1, 5) as $i)
                <td style="border: 2px solid secondary; padding: 15px; text-align: center;">
                    @php 
                        $photo = 'photo' . $i; 
                        $imagePath = public_path('documents24/' . $completion->$photo); 
                    @endphp
                    @if($completion && $completion->$photo && file_exists($imagePath))
                        @php
                            $imageData = base64_encode(file_get_contents($imagePath));
                            $src = 'data:image/jpeg;base64,'.$imageData; // Adjust MIME type based on your image type
                        @endphp
                        <img src="{{ $src }}" height="100px" width="100px" alt="Photo {{ $i }}">
                    @else
                        <strong>No photo uploaded</strong>
                    @endif
                </td>
            @endforeach
        </tr>
    </table>
    
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 40%; border: 1px solid #ccc; padding: 8px;">Total Amount</td>
            <td style="width: 60%; border: 1px solid #ccc; padding: 8px;">
                <strong>{{ $completion ? number_format($completion->total_amount, 2) : 'No data available' }}</strong>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 8px;">Total Amount Paid by Donor</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                <strong>{{ $completion ? number_format($completion->total_amount_paid_by_donor, 2) : 'No data available' }}</strong>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 8px;">Community Contribution</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                <strong>{{ $completion ? number_format($completion->community_contribution, 2) : 'No data available' }}</strong>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 8px;">Any Other</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                <strong>{{ $completion ? $completion->any_other : 'No data available' }}</strong>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 8px;">Geo Location</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                <strong>{{ $completion ? $completion->geo_location : 'No data available' }}</strong>
            </td>
        </tr>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js" integrity="sha512-z8IYLHO8bTgFqj+yrPyIJnzBDf7DDhWwiEsk4sY+Oe6J2M+WQequeGS7qioI5vT6rXgVRb4K1UVQC5ER7MKzKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</body>
</html>
