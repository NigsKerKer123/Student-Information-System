<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Student ID</th>
                <th scope="col" class="p-4">Student Name</th>
                <th scope="col" class="p-4">Grade</th>
                <th scope="col" class="p-4">Action</th>
            </tr>
        </thead>

            @foreach($grade as $gradeData)
                @if($subjectData->subjectid == $gradeData->subjectid)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$gradeData->studentid}}
                        </th>

                        <td class="px-6 py-4">
                            {{$gradeData->lastname}}, {{$gradeData->firstname}} {{$gradeData->middleInitial}}
                        </td>
                        <input type="hidden" name="studentid_{{$gradeData->studentid}}" value="{{$gradeData->studentid}}">
                        <input type="hidden" name="subjectid_{{$gradeData->studentid}}" value="{{$subjectData->subjectid}}">
                        
                        <td class="w-4 p-4">
                            <select id="grade" name="grade{{$gradeData->studentid}}">
                                <option value></option>
                                <option value="1.0"{{ $gradeData->grade == 1.0 ? ' selected' : '' }}>1.0</option>
                                <option value="1.25"{{ $gradeData->grade == 1.25 ? ' selected' : '' }}>1.25</option>
                                <option value="1.5"{{ $gradeData->grade == 1.5 ? ' selected' : '' }}>1.5</option>
                                <option value="1.75"{{ $gradeData->grade == 1.75 ? ' selected' : '' }}>1.75</option>
                                <option value="2.0"{{ $gradeData->grade == 2.0 ? ' selected' : '' }}>2.0</option>
                                <option value="2.25"{{ $gradeData->grade == 2.25 ? ' selected' : '' }}>2.25</option>
                                <option value="2.5"{{ $gradeData->grade == 2.5 ? ' selected' : '' }}>2.5</option>
                                <option value="2.75"{{ $gradeData->grade == 2.75 ? ' selected' : '' }}>2.75</option>
                                <option value="3.0"{{ $gradeData->grade == 3.0 ? ' selected' : '' }}>3.0</option>
                                <option value="5"{{ $gradeData->grade == 5 ? ' selected' : '' }}>5</option>
                                <option value="NIC"{{ $gradeData->grade == 'NIC' ? ' selected' : '' }}>NIC</option>
                            </select>
                        </td>
                        
                        <td class="w-4 p-4">
                            <!-- delete button -->
                            
                            <!-- <form style="display: inline-block;" action="{{ route('gradeRemove') }}" method="POST" id="delete">
                                @csrf
                                @method('DELETE') -->
                                <!-- <input type="hidden" name="studentid_{{$gradeData->studentid}}" value="{{$gradeData->studentid}}">
                                <input type="hidden" name="subjectid_{{$gradeData->studentid}}" value="{{$subjectData->subjectid}}"> -->

                                <button id="deleteButton" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md"
                                style="background-color: red; transition: background-color 0.3s ease-in-out;"
                                onmouseover="this.style.backgroundColor='gray'"
                                onmouseout="this.style.backgroundColor='red'">PotBol</button>
                            <!-- </form> -->
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
