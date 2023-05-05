@extends('pages.layouts.dashboard')
@section('content')

    <!-- ============== START CONTENT ==============  -->
    <div class="row">
        <div class="card">
            <div class="card-header border-bottom-0 p-4">
                <h2 class="card-title">1 - 30 of 546 </h2>
                <div class="page-options d-flex float-right">

                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">الرقم</th>
                                    <th class="wd-15p">الاسم</th>
                                    <th class="wd-15p">رقم الهاتف</th>
                                    <th class="wd-15p">الايميل</th>
                                    <th class="wd-15p">وقت الارسال</th>
                                    <th class="wd-25p">الرسالة</th>
                                    <th class="wd-10p">حذف</th>
                                    <th class="wd-10p">عرض</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->phone}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{ date('M j, Y h:m', strtotime($message->created_at)) }}</td>
                                        <td>{{ substr(strip_tags($message->text), 0, 50) }}
                                            @if(strlen(strip_tags($message->text)) > 50)
                                                <a href="view_comment.blade.php">قراءة المزيد</a>
                                            @else
                                                ""
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('message.destroy',$message)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                        <td><a class="btn btn-sm btn-secondary" href="{{route('message.show',$message)}}"><i
                                                    class="fa fa-info-circle"></i> View</a></td>
                                    </tr>
                                @endforeach
                                {{--                                            <tr>--}}
                                {{--                                                <td>2</td>--}}
                                {{--                                                <td>Ahmed Yosef</td>--}}
                                {{--                                                <td>05347678787</td>--}}
                                {{--                                                <td>2021-01-25 10:30 PM</td>--}}
                                {{--                                                <td>4.5</td>--}}
                                {{--                                                <td>Test Comment ..<a href="view_comment.blade.php">Read More</a></td>--}}
                                {{--                                                <td><a class="btn btn-sm btn-primary" href="add_product.php"><i class="fa fa-edit"></i> Edit</a>--}}
                                {{--                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
                                {{--                                                </td>--}}
                                {{--                                                <td><a class="btn btn-sm btn-secondary" href="view_comment.blade.php"><i class="fa fa-info-circle"></i> View</a> </td>--}}
                                {{--                                            </tr>--}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- TABLE WRAPPER -->
                </div>
                <!-- SECTION WRAPPER -->
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
        <!-- ============== END CONTENT ==============  -->
@endsection
