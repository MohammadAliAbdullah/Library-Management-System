


{{-- -------------View student data start ----------- --}}
<div id="contentContainer">

<div class="row">
        <div class="col-sm-12">
                
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="">
              <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">No</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">id</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Name</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Department</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Registration No</th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Roll No </th>
                <th class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Phone No</th>
            
              </tr>
            </thead>
             <tbody>
                    @foreach ($students as $student)
                    {{-- {{($loop->count)}} --}}
            <tr role="row" class="odd">
               
                <td>{{($loop->index + 1)}}</td> 
                <td class="sorting_1">{{$student->id}}</td>
                <td class="hidden-xs">{{$student->name}}</td>
                <td class="hidden-xs">{{$student->Department->departmentName}}</td>
                <td class="hidden-xs">{{$student->registerNo}}</td>
                <td class="hidden-xs">{{$student->rollNo}}</td>
                <td class="hidden-xs">{{$student->phoneNo}}</td>                    
            </tr>
                @endforeach
             </tbody>
          </table>
        </div>
    </div>
</div>
 
{{-- -------------View student data end ------------- --}}



