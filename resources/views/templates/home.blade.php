@extends('app')
@section('content')
    <style>
        #container {
            width: 80%;
            margin: auto;
        }
        .item {
            background: white;
            width: 320px;
            height: 320px;
        }
        .item img {
            width:100%;
            height:100%;
            object-fit:cover;
        }

    </style>
    <div class="col-md-12">
    <div class="col-md-4 pull-right">
        You are home: <a href="/profile/{{$user->id}}">{{$user->name}}</a>
        <img src="{{$profile_picture }}"/>
    </div>
    </div>
            <div class="col-md-12">
            <div id="container">
                @foreach($all_images as $image)
                <?php $div_item = "<div class='item'>"; ?>
                {!! $div_item !!}
                    <img src="{{'/images/'.$image->filePath}}"/>
            </div>
                @endforeach

            </div>
            </div>
            <script>
                $(function() {
                    var wall = new freewall("#grid");
                    wall.fitWidth();
                    var images = wall.container.find('.brick');
                    images.find('img').load(function() {
                        wall.fitWidth();
                    });

                });
            </script>

@endsection
