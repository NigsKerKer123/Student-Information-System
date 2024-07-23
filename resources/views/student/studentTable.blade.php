<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>



<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="py-1 bg-blueGray-50">
<div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24" style="width: 90%;">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">Student List</h3>
        </div>
        <!-- button here -->
        @include('student.modal')
      </div>
    </div>
    
    <!-- Table here -->
    <div class="block w-full overflow-x-auto">
      
      <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
          <tr>
            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          StudentID
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          LastName
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          FirstName
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          MiddleInitial
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Gender
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Age
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          section
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          schoolyear
          </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left" style="text-align: center;">
                          Action
          </th>
          </tr>
        </thead>

        <tbody>
          @foreach ($student as $studentData)
          <tr>
            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
              {{$studentData->studentid}}
            </th>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
              {{$studentData->lastname}}
            </td>
            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->firstname}}
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->middleInitial}}
            </td>
            
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->gender}}
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->age}}
            </td>

            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->section}}
            </td>

            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{$studentData->schoolyear}}
            </td>

            <!--Action buttons here -->
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

              <button data-modal-target="enroll-modal{{$studentData->studentid}}" data-modal-toggle="enroll-modal{{$studentData->studentid}}" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md" type="button" style="background-color: green; transition: background-color 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='gray'" onmouseout="this.style.backgroundColor='green'">
              ENROLL
              </button>
  
              <!-- Edit Modal toggle -->
              <button data-modal-target="edit-modal{{$studentData->studentid}}" data-modal-toggle="edit-modal{{$studentData->studentid}}" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md" style="background-color: darkorange; transition: background-color 0.3s ease-in-out;" type="button" onmouseover="this.style.backgroundColor='gray'" onmouseout="this.style.backgroundColor='darkorange'">
              EDIT
              </button>

              <!-- delete button -->
              <form action="{{ route('studentDelete', $studentData->studentid) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md"
                style="background-color: red; transition: background-color 0.3s ease-in-out;"
                onmouseover="this.style.backgroundColor='gray'"
                onmouseout="this.style.backgroundColor='red'">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{$student->links()}}
</div>
<footer class="relative pt-8 pb-6 mt-16">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
        </div>
      </div>
    </div>
  </div>
</footer>
</section>
</body>
</html>

<!-- Modal body here -->
@foreach ($student as $studentData)
  @include('student.editModal')
@endforeach

@foreach ($student as $studentData)
  @include('student.enrollModal')
@endforeach