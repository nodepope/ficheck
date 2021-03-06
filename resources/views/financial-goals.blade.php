@extends('layouts.app')

@section('content')
  <div class="ficheck-sections financial-goals">
    @include('layouts.title', ['title'=>'Financial Goals'])

    @include('partials.form-errors')

    @foreach($goalTypes as $goalType)
      <div class="ficheck-section-type financial-goal-type financial-goal-type-{{$goalType->slug}} row" id="financial-goal-type-{{$goalType->slug}}">
        <h2>{{$goalType->title}}s | {{$goalType->description}}</h2>

        @foreach($goalType->goals as $goal)
          <div class="body">
            @include('partials.financial-goal', ['goal'=>$goal])
          </div>
        @endforeach

        <div class="template">
          @include('partials.financial-goal', ['goal'=>new \App\FinancialGoal()])
        </div>

        @if(count($goalType->goals))
          <a href="#add">add {{strtolower($goalType->title)}}</a>
        @endif
      </div>
    @endforeach
  </div>
@endsection
