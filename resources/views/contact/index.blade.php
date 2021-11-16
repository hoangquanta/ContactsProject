
@extends('dashboard')
@section('content')
<div class="container">
    <table style="width: 1200px; margin: 0 auto">
        <tr>
            <th>Contact ID</th>
            <th>Contact Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Content</th>
            <th> </th>
            <th> </th>
        </tr>

        @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->contact_name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->title}}</td>
                <td>{{$contact->content}}</td>

                {{-- Button delete --}}                    
                <td>                        
                    <form action="{{route('contacts.delete',['id'=>$contact->id])}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>

                {{-- Button edit --}}                    
                <td>
                    <a href="{{route('contacts.edit',['id'=>$contact->id])}}"><button type="submit">Edit</button></a>                            
                </td>

            </tr>
        @endforeach
    </table>

    {{-- Button add --}}        
    <form action="{{route('contacts.add')}}" method="get" style="margin-top: 30px; text-align: center">
        <button type="submit" >Add contact</button>            
    </form>
</div>
@endsection
