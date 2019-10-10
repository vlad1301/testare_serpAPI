
@extends('layouts.app')

@section('content')
    {{--{{csrf_field()}}--}}
    <form method="post" action="/posts">

        <input type="text" name="cuvant_cheie" placeholder="Cuvant cheie">

        <input type="text" name="motor_cautare" placeholder="Motor cautare">

      {{--  <input type="text" name="locatie" placeholder="Locatia">--}}

        <input type="text" name="limba" placeholder="Limba">

        <input type="submit" name="submit" value="Cauta">
        {{csrf_field()}}
    </form>


    @stop

@section('footer')



@stop