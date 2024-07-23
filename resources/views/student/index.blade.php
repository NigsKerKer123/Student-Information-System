@if(session('error'))
    @php
        echo '<script type="text/javascript">window.alert("'. session('error') .'");</script>';
    @endphp
@endif

@if(session('success'))
    @php
        echo '<script type="text/javascript">window.alert("'. session('success') .'");</script>';
    @endphp
@endif
<x-app-layout>
    @include('student.studentTable')
</x-app-layout>
