@extends('layouts.admin')


@section('content')



    @if(!empty($aperos))
        {{$aperos->links()}}

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>EMAIL</th>
                    <th>DATE DE PUBLICATION</th>
                    <th>DATE DE L'EVENEMENT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @include('admin.partials.flash_message')
                    @foreach($aperos as $apero)

                        <td><a href="{{route('admin.apero.edit', [$apero->id])}}">{{$apero->title}}</a></td>

                        <td>@if (empty($apero->user->username))
                                invité
                            @else
                                {{$apero->user->username}}
                            @endif
                        </td>
                        <td>{{$apero->user->email}}</td>
                        <td>{{$apero->created_at}}</td>
                        <td>{{$apero->date_event}}</td>
                        <td><a href="{{route('admin.apero.edit', [$apero->id])}}"><input type="submit" value="edit"></a>
                        </td>
                        <td>
                            <form class="delete" action="{{route('admin.apero.destroy',[$apero->id])}}" method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <input type="submit" value="supprimer"></form>
                        </td>

                        <td>
                            <form action="{{route('admin.publish.update', [$apero->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                @if($apero->status == "published")

                                    <input type="hidden" value="unpublished" name="status">

                                    <input type="submit" value="Dépublier">

                                @else

                                    <input type="hidden" value="published" name="status">

                                    <input type="submit" value="Publier">

                                @endif
                            </form>
                        </td>


                        <td><p>{{$apero->status}}</p></td>
                </tr>
                @endforeach


                @else
                    <p>Aucun apero trouvé</p>
                @endif

                </tbody>
            </table>
            <p>{{$aperos->links()}}</p>
        </div>
@endsection
