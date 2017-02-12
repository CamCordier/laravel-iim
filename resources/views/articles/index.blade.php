@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Title -->
                <h1>Blog Post Title</h1>
                <div class="container">
                    <div class="row">
                            @include('messages.success')

                        <div class="col-md-10">

                            <p class="lead">
                                by <a href="index.php">Start Bootstrap</a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>

                            <h1>Article</h1>
                            <br><br><br><br>
                                <!-- Post Content -->
                                <ul>
                                    @foreach($articles as $article)
                                        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                                        <a href="{{ route('article.show', $article->id) }}">{{$article->body}}</a>
                                        <br><br><hr><br><br>
                                    @endforeach
                                </ul>
                                {{$articles->links()}}

                        </div>
                      </div>
                 </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>

    </html>

@endsection
