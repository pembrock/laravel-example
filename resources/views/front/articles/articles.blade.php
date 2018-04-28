@extends('layout.front')
@section('content')
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Статьи
            </h3>
            @foreach($articlesList as $article)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="{{ route('front.articles.show', $article->id) }}">{{ $article->header }}</a></h2>
                <p class="blog-post-meta">{{ $article->created_at->format('d.m.Y h:i') }}</p>
                <p>{!! $article->description !!}</p>
                {{--<img src="{{ asset($article->img_path) }}" class="img-fluid" alt="">--}}
            </div><!-- /.blog-post -->
            @endforeach
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">

            @if(isset($archive))
                <div class="p-3">
                    <h4 class="font-italic">Архив</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($archive as $stats)
                            <li @if(isset($year) && isset($month) && $stats->year == $year && $stats->month == $month) class="active-archive-link"@endif>{{ app('request')->input('year') }}<a href="{!! route('front.articles.archive', ['month' => $stats->month, 'year' => $stats->year]) !!}">{{ $stats->year }} {{ $stats->month }}</a></li>
                        @endforeach
                    </ol>
                </div>
            @endif

        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
@stop