@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row gap-3 grid">
            @foreach ($projects as $project)
            <div class="card">
                @if ($project->image)
                    <div class="img-container">
                        <img src="{{asset('storage/' . $project->image )}}" alt="">
                    </div>
                @else
                    <div class="img-container">
                        <img src="{{$project->thumb}}" alt="">
                    </div>
                @endif
                <div>
                    <ul>
                        
                        <li><a href="{{route('projects.show', $project)}}">{{$project->name}}</a></li>
                        <li>
                            {{isset($project->type) ? $project->type->name : '-'}}
                        </li>
                        <ul>
                            <h4>Tecnologie</h1>
                            @foreach ($project->technologies as $technology)
                            <li class="badge rounded-pill text-bg-primary">{{ $technology->name }}</li>
                            @endforeach 
                        </ul>
                        <li>{{$project->admin}}</li>

                        <span><a href="{{route('projects.edit', $project)}}" class="btn btn-primary my-3">Edit</a></span>
                        <form action="{{route('projects.destroy', $project)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella" class="btn btn-danger">
                        </form>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
    
@endsection


