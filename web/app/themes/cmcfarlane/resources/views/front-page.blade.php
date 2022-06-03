{{--
  Template Name: Front Page
--}}

@extends( 'layouts.app' )

@section( 'content' )
  @include( 'partials.content-personal-intro' )
  @include( 'partials.content-resume' )
  @include( 'partials.content-projects' )
@endsection
