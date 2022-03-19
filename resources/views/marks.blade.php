<h1>CA2 Calculation Page</hi>
<form method="POST">
    @csrf
<input type="text" name="maths" placeholder="Maths Marks" > <br> <br>
<input type="text" name="english" placeholder="English Marks" > <br> <br>
<input type="text" name="physics" placeholder="Physics Marks" > <br> <br>
<input type="text" name="chemistry" placeholder="Chemistry Marks" > <br> <br>
<input type="text" name="biology" placeholder="Biology Marks" > <br> <br>
<button type="submit">Calculate</button>

@if (count($errors)>0)
    <div style="color:red">
    Please Enter Marks For all Courses, The following courses have invalid marks:
        <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@isset($percentage)
<h2>your percetage is {{$percentage}}% and your grade is {{$grade}} </h2>
@endisset

</form>
