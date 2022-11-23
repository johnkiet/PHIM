@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-primary">Danh Sách Tập Phim</a>
                    <div class="card-header">Quản Lý Tập Phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open([
                                'route' => ['episode.update', $episode->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn phim', []) !!}
                            {!! Form::select('movie_id', ['0'=>"Chọn Phim",'Danh Sách Phim'=>$list_movie], isset($episode) ? $episode->movie_id : '', [
                                'class' => 'form-control select-movie', isset($episode) ? 'disabled' : ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('linkphim', 'Link', []) !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                            ]) !!}
                        </div>
                        @if(isset($episode))
                        <div class="form-group">
                            {!! Form::label('tapphim', 'Tập phim', []) !!}
                            {!! Form::text('tapphim', isset($episode) ? 'tập '.$episode->episode : '', [
                                'class' => 'form-control',
                                'placeholder' => '...', isset($episode) ? 'disabled' : '',
                            ]) !!}
                        </div>
                        @else
                        <div class="form-group">
                            {!! Form::label('linkphim', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="episode_movie">
                            </select>
                        </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::submit('Thêm Tập Phim', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Tập Phim', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
