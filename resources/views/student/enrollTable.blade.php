<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4"></th>
                <th scope="col" class="px-6 py-3">Subject ID</th>
                <th scope="col" class="px-6 py-3">Subject Name</th>
            </tr>
        </thead>

        @foreach ($subject as $subjectData)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                <form action="{{ route('enrollstudent') }}" method="POST" id="{{$subjectData->subjectid}}{{$studentData->studentid}}">
                    @csrf
                    <input type="hidden" name="subjectid" value="{{ $subjectData->subjectid }}">
                    <input type="hidden" name="subjectname" value="{{ $subjectData->subjectname }}">
                    <input type="hidden" name="studentid" value="{{ $studentData->studentid }}">
                    <input type="hidden" name="lastname" value="{{ $studentData->lastname }}">
                    <input type="hidden" name="firstname" value="{{ $studentData->firstname }}">
                    <input type="hidden" name="middleInitial" value="{{ $studentData->middleInitial }}">
                    <input type="hidden" name="grade">
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md" style="background-color: green; transition: background-color 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='gray'" onmouseout="this.style.backgroundColor='green'">+</button>
                </form>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $subjectData->subjectid }}
                </th>
                <td class="px-6 py-4">
                    {{ $subjectData->subjectname }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
