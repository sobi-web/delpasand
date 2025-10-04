


@foreach($exercises as $exercise)

    <ul>
        <li>name: {{$exercise->name}}</li>
        <li>description: {{$exercise->description}}</li>
        <li>tag:
          @foreach($exercise->tags as $tag)
           -{{  $tag->name}}
          @endforeach
        </li>
    </ul>


@endforeach
