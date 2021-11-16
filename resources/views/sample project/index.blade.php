
            <ul>
                @foreach ($project as $project)
                    <li>
                        <a href="/project/{{$project->id}}">
                            {{ $project -> ten_du_an}}
                        </a>
                    </li>
                @endforeach
            </ul>
  




        
