<h1>{{ $title }}</h1>
<p>{{ $date }}</p>
<p></p>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Sem</th>
        <th>Div</th>
        <th>Subject</th>
        <th>Project</th>
        <th>Mark</th>
    </tr>

    @foreach($users as $user)
    <tr>   
        <td>{{ $user->name }}</td>
        <td>{{ $user->sem }}</td>
        <td>{{ $user->div }}</td>
        <td>{{ $user->subject }}</td>
        <td>{{ $user->project }}</td>
        <td>{{ $user->mark }}</td>

        


    </tr>
    @endforeach
</table>

        </div>
    </div>
</div>
</div>
</div>