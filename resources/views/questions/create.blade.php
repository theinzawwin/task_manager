<div>
<form action="{{route('questions.store')}}" method="post">
@csrf
    <label>Name</label>
    <input type="text" name="name" />
    <br>
    <label>Description</label>
    <input type="text" name="description" />
    <br>
    <label>Mark</label>
    <input type="number" name="mark" />
    <br>
    <input type="submit" value="Save" />
    </form>
</div>