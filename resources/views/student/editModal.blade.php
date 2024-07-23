    
    <!-- Main modal -->
    <div id="edit-modal{{$studentData->studentid}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Student
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal{{$studentData->studentid}}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal Form Here -->
                <form class="p-4 md:p-5" method="POST" action="{{route('studentEdit', $studentData->studentid)}}">
                @csrf
                @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <!-- student id -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="studentid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                            <input type="text" name="studentid" id="studentid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Student ID" required="" value="{{ $studentData->studentid }}">
                        </div>
                        
                        <!-- Lastname -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Student ID" required="" value="{{ $studentData->lastname }}">
                        </div>
                        
                        <!-- Firstname -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Firstname" required="" value="{{$studentData->firstname}}">
                        </div>

                        <!-- MiddleInitial -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="middleInitial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Initial</label>
                            <select id="middleInitial" name="middleInitial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Middle Initial</option>
                            @foreach (range('A', 'Z') as $letter)
                                @if ($studentData->middleInitial == $letter)
                                    <option value="{{ $letter }}" selected>{{ $letter }}</option>
                                @else
                                    <option value="{{ $letter }}">{{ $letter }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        
                        <!-- Gender -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select Gender</option>
                                @if($studentData->gender == "male")
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                @else
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                @endif
                            </select>
                        </div>

                        <!-- age -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">age</label>
                            <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter age" required="" value="{{$studentData->age}}">
                        </div>

                        <!-- section -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                            <input type="text" name="section" id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter section" required="" value="{{$studentData->section}}">
                        </div>

                        <!-- schoolyear -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year</label>
                            <select id="schoolyear" name="schoolyear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ">
                                <option value="" {{ $studentData->schoolyear == "" ? 'selected' : '' }}>Select schoolyear</option>
                                <option value="1st year" {{ $studentData->schoolyear == "1st year" ? 'selected' : '' }}>1st year</option>
                                <option value="2nd year" {{ $studentData->schoolyear == "2nd year" ? 'selected' : '' }}>2nd year</option>
                                <option value="3rd year" {{ $studentData->schoolyear == "3rd year" ? 'selected' : '' }}>3rd year</option>
                                <option value="4th year" {{ $studentData->schoolyear == "4th year" ? 'selected' : '' }}>4th year</option>
                            </select>
                        </div>
                        
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="background-color: darkorange; transition: background-color 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='gray'" onmouseout="this.style.backgroundColor='darkorange'">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Update Student
                    </button>
                </form>
            </div>
        </div>
    </div>
   