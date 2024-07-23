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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    @include ('grade.subjectListTable');
</x-app-layout>