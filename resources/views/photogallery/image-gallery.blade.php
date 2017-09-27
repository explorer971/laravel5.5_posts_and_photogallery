@extends('layouts.layout')

@section('content')
<div class="container">
    
<div id="top"></div>

    <div id="page">

        <h1>Photography</h1>

        <div id="container">
            <ul>
                <li>
                @foreach($images as $image)
                    <img width="640" height="400" alt="Desert" src="/images/{{ $image->image }}" />
                @break
                @endforeach
                </li>    
                <li><img src="../img/photos/2.jpg" width="640" height="400" alt="Desert" /></li>
                <li><img src="../img/photos/3.jpg" width="640" height="400" alt="Desert" /></li>
                <li><img src="../img/photos/4.jpg" width="640" height="400" alt="Machinery" /></li>
            </ul>
        </div>
        <!-- You are free to remove this footer -->

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../jquery.shutter/jquery.shutter.js"></script>
    <script src="../js/script.js"></script>
</div>

</br>
</br>

<div class="container">
    <div class="row">
        <div class='list-group gallery'>

            @if($images->count())
                @foreach($images as $image)
                <div class='col-md-3 margin-bottom20' style="margin-bottom: 20px;">
                    <div class='text-center'>
                        <small class='text-muted' style="color:white;">{{ $image->title }}</small>
                    </div> <!-- text-center / end -->
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                        <img class="img-responsive" style="height:200px" alt="" src="/images/{{ $image->image }}" />

                    </a>
                    <form action="{{ url('/photogallery/image-gallery',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger" style="width: 100%;" onclick="return confirm('точно хотите удалить?') ? true : false;" >Удалить фото <i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
            @endif

        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
@endsection