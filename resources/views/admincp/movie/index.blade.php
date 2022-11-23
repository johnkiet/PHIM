@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm Phim</a>
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Phim hot</th>
                            <th scope="col">Chất lượng</th>
                            <th scope="col">Phụ đề</th>
                            <th scope="col">Trailer</th>
                            <!-- <th scope="col">Mô tả</th> -->
                            <th scope="col">Đường dẫn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Quốc gia</th>
                            <th scope="col">Số tập</th>
                            {{-- <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Thời lượng</th> --}}
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td><img width="100" src="{{ asset('uploads/movie/' . $cate->image) }}"></td>
                                <td>
                                    @if ($cate->phim_hot == 0)
                                        Không
                                    @else
                                        Có
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->resolution == 0)
                                        FullHD
                                    @elseif ($cate->resolution == 1)
                                        HD
                                    @elseif ($cate->resolution == 2)
                                        SD
                                    @elseif ($cate->resolution == 3)
                                        CAM
                                    @elseif ($cate->resolution == 4)
                                        Trailer
                                    @endif
                                </td>
                                <td>
                                    @if ($cate->phude == 0)
                                        Vietsub
                                    @else
                                        @if ($cate->phude == 1)
                                            Lòng Tiếng
                                        @else
                                            Không Phụ Đề
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $cate->trailer }}</td>
                                <!-- <td>{{ $cate->description }}</td> -->
                                <td>{{ $cate->slug }}</td>
                                <td>
                                    @if ($cate->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>{{ $cate->category->title }}</td>
                                <td>
                                    @foreach($cate->movie_genre as $key=>$gen)
                                    <span class="badge badge-secondary">{{$gen->title}}</span>
                                    @endforeach
                                </td>
                                <td>{{ $cate->country->title }}</td>
                                <td>{{ $cate->sotap }}</td>

                                {{-- <td>{{ $cate->ngaytao }}</td>
                                <td>{{ $cate->ngayupdate }}</td>
                                <td>{{ $cate->thoiluong }}</td> --}}


                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
